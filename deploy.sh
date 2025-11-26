#!/bin/bash

echo "🚀 Déploiement de FobsDev..."

# Mettre à jour les dépendances Composer
echo "📦 Installation des dépendances..."
composer install --no-dev --optimize-autoloader

# Vider tous les caches
echo "🧹 Nettoyage des caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Optimiser l'application
echo "⚡ Optimisation..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Exécuter les migrations
echo "🗄️ Mise à jour de la base de données..."
php artisan migrate --force

# Créer le lien de stockage si nécessaire
echo "🔗 Création du lien de stockage..."
php artisan storage:link

# Optimiser l'autoloader
echo "🎯 Optimisation de l'autoloader..."
composer dump-autoload -o

# Définir les permissions correctes
echo "🔐 Définition des permissions..."
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

echo "✅ Déploiement terminé avec succès !"
