#!/bin/bash

# Script de correction des erreurs Blade sur le serveur

echo "=========================================="
echo "🔧 Correction Erreurs Blade - Serveur"
echo "=========================================="
echo ""

# 1. Nettoyer tous les caches
echo "1️⃣  Nettoyage complet des caches..."
php artisan view:clear
php artisan config:clear
php artisan route:clear
php artisan cache:clear
php artisan clear-compiled

echo ""
echo "2️⃣  Optimisation des autoloads..."
composer dump-autoload

echo ""
echo "3️⃣  Test de compilation Blade..."
php artisan view:cache

if [ $? -eq 0 ]; then
    echo "   ✅ Compilation Blade réussie!"
else
    echo "   ❌ Erreur de compilation Blade"
    echo "   Nettoyage et sortie..."
    php artisan view:clear
    exit 1
fi

echo ""
echo "4️⃣  Nettoyage final du cache de vue..."
php artisan view:clear

echo ""
echo "5️⃣  Vérification des permissions..."
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || echo "   ⚠️  Impossible de changer le propriétaire (exécuter avec sudo si nécessaire)"

echo ""
echo "=========================================="
echo "✅ Correction terminée!"
echo "=========================================="
echo ""
echo "📋 Prochaines étapes:"
echo "   1. Testez le site: http://votre-domaine.com"
echo "   2. Si l'erreur persiste, vérifiez les logs: tail -f storage/logs/laravel.log"
echo "   3. Assurez-vous que tous les fichiers .blade.php sont corrects"
echo ""
