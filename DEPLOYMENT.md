# Guide de Déploiement - FobsDev

## 🚀 Déploiement sur le Serveur

### Prérequis
- PHP 8.1+
- Composer
- MySQL/MariaDB
- Node.js & NPM (optionnel)

### Étapes de Déploiement

#### 1. Cloner le projet
```bash
git clone https://github.com/BoreilFobs/FobsDev.git
cd FobsDev
```

#### 2. Installer les dépendances
```bash
composer install --no-dev --optimize-autoloader
```

#### 3. Configurer l'environnement
```bash
cp .env.example .env
php artisan key:generate
```

Modifier le fichier `.env` avec vos paramètres :
```
APP_NAME="FobsDev"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-domaine.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=votre_base_de_donnees
DB_USERNAME=votre_utilisateur
DB_PASSWORD=votre_mot_de_passe
```

#### 4. Configurer la base de données
```bash
php artisan migrate --force
php artisan db:seed --force
```

#### 5. Vider et optimiser les caches
```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

php artisan config:cache
php artisan route:cache
php artisan view:cache
```

#### 6. Créer le lien de stockage
```bash
php artisan storage:link
```

#### 7. Définir les permissions
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

#### Ou utiliser le script automatique
```bash
chmod +x deploy.sh
./deploy.sh
```

## 🔧 Résolution de Problème : "Undefined variable $portfolioItems"

Si vous recevez cette erreur, exécutez :

```bash
# 1. Vider tous les caches
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# 2. Vérifier que HomeController existe
ls -la app/Http/Controllers/HomeController.php

# 3. Optimiser l'autoloader
composer dump-autoload -o

# 4. Re-cacher les configurations
php artisan config:cache
php artisan route:cache
```

## 📝 Créer un Utilisateur Admin

```bash
php artisan tinker
```

Puis dans tinker :
```php
use App\Models\User;
User::create([
    'name' => 'Admin',
    'email' => 'admin@fobsdev.com',
    'password' => bcrypt('votre_mot_de_passe'),
]);
```

## 🌐 Configuration du Serveur Web

### Apache (.htaccess déjà inclus)
Assurez-vous que le DocumentRoot pointe vers `/public`

### Nginx
```nginx
server {
    listen 80;
    server_name votre-domaine.com;
    root /var/www/FobsDev/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## 🔄 Mises à Jour Futures

Pour mettre à jour le site :

```bash
git pull origin europe
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
```

## 📧 Support

Pour toute question : admin@fobsdev.com
