#!/bin/bash

echo "🔧 Correction de l'erreur 'Undefined variable \$portfolioItems'..."

# Vider tous les caches
echo "1️⃣ Nettoyage des caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Optimiser l'autoloader
echo "2️⃣ Optimisation de l'autoloader..."
composer dump-autoload -o

# Re-cacher les configurations
echo "3️⃣ Re-création des caches..."
php artisan config:cache
php artisan route:cache

echo "✅ Correction terminée ! Essayez de recharger la page."
