#!/bin/bash

echo "🔧 Script de correction rapide - fobs.dev"
echo "=========================================="
echo ""

PROJECT_DIR="/var/www/fobsdev"

cd $PROJECT_DIR

echo "1️⃣ Nettoyage des caches Laravel..."
sudo -u www-data php artisan config:clear
sudo -u www-data php artisan route:clear
sudo -u www-data php artisan view:clear
sudo -u www-data php artisan cache:clear
echo "✅ Caches nettoyés"

echo ""
echo "2️⃣ Mise à jour depuis Git..."
sudo -u www-data git pull origin europe
echo "✅ Code mis à jour"

echo ""
echo "3️⃣ Suppression du cache compilé des vues..."
sudo rm -rf storage/framework/views/*
sudo rm -rf storage/framework/cache/data/*
echo "✅ Cache compilé supprimé"

echo ""
echo "4️⃣ Mise à jour des dépendances..."
sudo -u www-data composer install --no-dev --optimize-autoloader
echo "✅ Dépendances mises à jour"

echo ""
echo "5️⃣ Reconstruction des caches..."
sudo -u www-data php artisan config:cache
sudo -u www-data php artisan route:cache
echo "✅ Caches reconstruits"

echo ""
echo "6️⃣ Vérification de la syntaxe Blade..."
sudo -u www-data php artisan view:cache
if [ $? -eq 0 ]; then
    echo "✅ Toutes les vues sont valides!"
    sudo -u www-data php artisan view:clear
else
    echo "❌ Erreur de syntaxe détectée!"
    echo ""
    echo "🔍 Nettoyage forcé du cache des vues..."
    sudo rm -rf storage/framework/views/*
    sudo -u www-data php artisan view:clear
fi

echo ""
echo "7️⃣ Vérification des permissions..."
sudo chown -R www-data:www-data $PROJECT_DIR
sudo chmod -R 755 $PROJECT_DIR
sudo chmod -R 775 $PROJECT_DIR/storage
sudo chmod -R 775 $PROJECT_DIR/bootstrap/cache
echo "✅ Permissions configurées"

echo ""
echo "✅ CORRECTION TERMINÉE!"
echo ""
echo "🌐 Testez maintenant: https://fobs.dev"
echo "📊 Logs: tail -f $PROJECT_DIR/storage/logs/laravel.log"
echo ""
