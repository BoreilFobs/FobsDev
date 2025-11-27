#!/bin/bash

echo "🚀 Déploiement de FobsDev - Europe Branch..."
echo ""

# Vérifier la branche
CURRENT_BRANCH=$(git branch --show-current 2>/dev/null || echo "unknown")
echo "📍 Branche actuelle: $CURRENT_BRANCH"
echo ""

# Mettre à jour les dépendances Composer
echo "📦 Installation des dépendances..."
composer install --no-dev --optimize-autoloader

# Vider tous les caches
echo "🧹 Nettoyage des caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
php artisan clear-compiled

# Exécuter les migrations
echo "🗄️ Mise à jour de la base de données..."
php artisan migrate --force

# Créer le lien de stockage si nécessaire
echo "🔗 Création du lien de stockage..."
php artisan storage:link

# Test de compilation Blade
echo "🔍 Test de compilation Blade..."
php artisan view:cache
if [ $? -eq 0 ]; then
    echo "   ✅ Compilation Blade réussie!"
    php artisan view:clear
else
    echo "   ❌ Erreur de compilation Blade - Exécutez ./fix-blade-errors.sh"
    exit 1
fi

# Optimiser l'application
echo "⚡ Optimisation..."
php artisan config:cache
php artisan route:cache
composer dump-autoload -o

# Définir les permissions correctes
echo "🔐 Définition des permissions..."
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || echo "   ⚠️  Besoin de sudo pour changer le propriétaire"

echo ""
echo "✅ Déploiement terminé avec succès !"
echo "🌐 Site: https://fobs.dev"
echo "📊 Logs: tail -f storage/logs/laravel.log"
echo ""
