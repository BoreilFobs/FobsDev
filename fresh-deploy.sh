#!/bin/bash

echo "🚀 Script de déploiement complet - fobs.dev"
echo "============================================"
echo ""

# Variables de configuration
PROJECT_DIR="/var/www/fobsdev"
REPO_URL="git@github.com:BoreilFobs/FobsDev.git"
BRANCH="europe"
DB_NAME="fobsdev"
DB_USER="root"
DB_PASS=""  # Sera demandé

echo "⚠️  ATTENTION: Ce script va:"
echo "  1. Sauvegarder la base de données"
echo "  2. Supprimer le dossier du projet"
echo "  3. Cloner le repo depuis GitHub"
echo "  4. Reconfigurer tout le projet"
echo ""
read -p "Voulez-vous continuer? (oui/non): " confirm

if [ "$confirm" != "oui" ]; then
    echo "❌ Opération annulée"
    exit 1
fi

# Demander le mot de passe MySQL
read -sp "Entrez le mot de passe MySQL: " DB_PASS
echo ""

# 1. SAUVEGARDE DE LA BASE DE DONNÉES
echo ""
echo "📦 Étape 1/9: Sauvegarde de la base de données..."
BACKUP_FILE="backup_$(date +%Y%m%d_%H%M%S).sql"
if [ -z "$DB_PASS" ]; then
    mysqldump -u $DB_USER $DB_NAME > ~/$BACKUP_FILE
else
    mysqldump -u $DB_USER -p$DB_PASS $DB_NAME > ~/$BACKUP_FILE
fi
echo "✅ Base de données sauvegardée: ~/$BACKUP_FILE"

# 2. SAUVEGARDER LE FICHIER .ENV
echo ""
echo "📋 Étape 2/9: Sauvegarde du fichier .env..."
if [ -f "$PROJECT_DIR/.env" ]; then
    cp "$PROJECT_DIR/.env" ~/.env.backup
    echo "✅ Fichier .env sauvegardé: ~/.env.backup"
else
    echo "⚠️  Aucun fichier .env trouvé"
fi

# 3. SAUVEGARDER LES IMAGES UPLOADÉES
echo ""
echo "🖼️  Étape 3/9: Sauvegarde des images uploadées..."
if [ -d "$PROJECT_DIR/public/uploads" ]; then
    cp -r "$PROJECT_DIR/public/uploads" ~/uploads_backup
    echo "✅ Images sauvegardées: ~/uploads_backup"
else
    echo "⚠️  Aucun dossier uploads trouvé"
fi

# 4. SUPPRIMER LE DOSSIER DU PROJET
echo ""
echo "🗑️  Étape 4/9: Suppression du dossier du projet..."
sudo rm -rf $PROJECT_DIR
echo "✅ Dossier supprimé"

# 5. CLONER LE REPOSITORY
echo ""
echo "📥 Étape 5/9: Clonage du repository..."
cd /var/www
sudo git clone -b $BRANCH $REPO_URL fobsdev
cd $PROJECT_DIR
echo "✅ Repository cloné"

# 6. INSTALLER LES DÉPENDANCES
echo ""
echo "📦 Étape 6/9: Installation des dépendances..."
sudo -u www-data composer install --no-dev --optimize-autoloader
echo "✅ Dépendances installées"

# 7. CONFIGURATION
echo ""
echo "⚙️  Étape 7/9: Configuration du projet..."

# Copier le .env sauvegardé ou créer un nouveau
if [ -f ~/.env.backup ]; then
    sudo cp ~/.env.backup $PROJECT_DIR/.env
    echo "✅ Fichier .env restauré"
else
    sudo cp .env.example .env
    sudo nano .env
    echo "⚠️  Nouveau fichier .env créé - configuré manuellement"
fi

# Restaurer les images
if [ -d ~/uploads_backup ]; then
    sudo mkdir -p $PROJECT_DIR/public/uploads
    sudo cp -r ~/uploads_backup/* $PROJECT_DIR/public/uploads/
    echo "✅ Images restaurées"
fi

# Générer la clé d'application si nécessaire
sudo -u www-data php artisan key:generate --force

# Permissions
sudo chown -R www-data:www-data $PROJECT_DIR
sudo chmod -R 755 $PROJECT_DIR
sudo chmod -R 775 $PROJECT_DIR/storage
sudo chmod -R 775 $PROJECT_DIR/bootstrap/cache

echo "✅ Configuration terminée"

# 8. BASE DE DONNÉES
echo ""
echo "🗄️  Étape 8/9: Configuration de la base de données..."
read -p "Voulez-vous migrer la base de données? (oui/non): " migrate_confirm
if [ "$migrate_confirm" == "oui" ]; then
    sudo -u www-data php artisan migrate:fresh --seed --force
    echo "✅ Base de données migrée"
else
    echo "⚠️  Migration ignorée"
fi

# 9. NETTOYAGE ET OPTIMISATION
echo ""
echo "🧹 Étape 9/9: Nettoyage et optimisation..."
sudo -u www-data php artisan config:clear
sudo -u www-data php artisan route:clear
sudo -u www-data php artisan view:clear
sudo -u www-data php artisan cache:clear
sudo rm -rf storage/framework/views/*
sudo -u www-data php artisan config:cache
sudo -u www-data php artisan route:cache
echo "✅ Optimisation terminée"

# VÉRIFICATION FINALE
echo ""
echo "🔍 Vérification de la syntaxe Blade..."
sudo -u www-data php artisan view:cache
if [ $? -eq 0 ]; then
    echo "✅ Toutes les vues sont valides!"
    sudo -u www-data php artisan view:clear
else
    echo "❌ Erreur de syntaxe détectée!"
    exit 1
fi

echo ""
echo "🎉 DÉPLOIEMENT TERMINÉ AVEC SUCCÈS!"
echo "===================================="
echo ""
echo "📋 Résumé:"
echo "  • Base de données: Migrée et seedée"
echo "  • Images: Restaurées"
echo "  • Caches: Nettoyés et optimisés"
echo "  • Permissions: Configurées"
echo ""
echo "🌐 Votre site: https://fobs.dev"
echo ""
echo "📁 Sauvegardes:"
echo "  • Base de données: ~/$BACKUP_FILE"
echo "  • Fichier .env: ~/.env.backup"
echo "  • Images: ~/uploads_backup"
echo ""
