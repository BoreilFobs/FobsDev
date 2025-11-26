# Configuration du Domaine - fobs.dev

## 📍 Informations du Domaine

**Domaine principal** : `fobs.dev`  
**URL complète** : `https://fobs.dev`  
**Localisation** : Rome, Italie (IT-RM)

## 🔧 Configuration

### Variables d'Environnement (.env)

```env
APP_NAME=FobsDev
APP_URL=https://fobs.dev
APP_DOMAIN=fobs.dev
```

### Fichiers SEO Mis à Jour

Tous les fichiers SEO utilisent maintenant `fobs.dev` :

1. **public/sitemap.xml**
   - Toutes les URLs : `https://fobs.dev/`
   - Images portfolio : `https://fobs.dev/assets/img/portfolio/...`

2. **public/robots.txt**
   - Sitemap : `https://fobs.dev/sitemap.xml`

3. **resources/views/layout.blade.php**
   - Meta tags dynamiques utilisant `{{ url()->current() }}`
   - Canonical URLs automatiques

4. **config/app.php**
   - `'url' => env('APP_URL', 'https://fobs.dev')`
   - `'domain' => env('APP_DOMAIN', 'fobs.dev')`

## 🌐 DNS Configuration

Pour pointer votre domaine vers le serveur :

### Enregistrements DNS Requis

```
Type    Nom     Valeur                  TTL
A       @       [IP_DU_SERVEUR]         3600
A       www     [IP_DU_SERVEUR]         3600
CNAME   www     fobs.dev                3600
```

### Exemple avec votre hébergeur

1. Connectez-vous au panneau DNS de votre registrar (GoDaddy, Namecheap, etc.)
2. Ajoutez un enregistrement A pointant vers l'IP de votre serveur
3. Ajoutez un enregistrement CNAME pour www

## 🔐 SSL/HTTPS Configuration

### Avec Let's Encrypt (Gratuit)

```bash
# Installer Certbot
sudo apt install certbot python3-certbot-apache

# Obtenir un certificat SSL
sudo certbot --apache -d fobs.dev -d www.fobs.dev

# Renouvellement automatique
sudo certbot renew --dry-run
```

### Après installation SSL

1. Décommenter les lignes HTTPS dans `public/.htaccess` :
   ```apache
   RewriteCond %{HTTPS} off
   RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
   ```

2. Mettre à jour `.env` sur le serveur :
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://fobs.dev
   ```

## 📊 Google Search Console

### Ajout du Site

1. Aller sur : https://search.google.com/search-console
2. Cliquer "Ajouter une propriété"
3. Entrer : `https://fobs.dev`
4. Vérifier la propriété :
   - Méthode recommandée : Balise HTML
   - Ajouter la balise dans `layout.blade.php`

### Soumettre le Sitemap

```
URL du sitemap : https://fobs.dev/sitemap.xml
```

## 🔍 Vérifications Post-Déploiement

### Checklist SEO

- [ ] DNS pointe vers le serveur
- [ ] SSL/HTTPS activé et fonctionnel
- [ ] `https://fobs.dev` accessible
- [ ] `www.fobs.dev` redirige vers `fobs.dev`
- [ ] Sitemap accessible : `https://fobs.dev/sitemap.xml`
- [ ] Robots.txt accessible : `https://fobs.dev/robots.txt`
- [ ] Meta tags présents dans le code source
- [ ] Open Graph tags visibles
- [ ] JSON-LD structured data valide

### Outils de Test

1. **SSL/HTTPS** : https://www.ssllabs.com/ssltest/
2. **Meta Tags** : https://metatags.io/
3. **Structured Data** : https://search.google.com/test/rich-results
4. **Mobile-Friendly** : https://search.google.com/test/mobile-friendly
5. **PageSpeed** : https://pagespeed.web.dev/

### Commandes de Vérification

```bash
# Test DNS
dig fobs.dev
nslookup fobs.dev

# Test connectivité
ping fobs.dev
curl -I https://fobs.dev

# Vérifier robots.txt
curl https://fobs.dev/robots.txt

# Vérifier sitemap
curl https://fobs.dev/sitemap.xml
```

## 📧 Configuration Email

Si vous utilisez un email professionnel avec votre domaine :

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.fobs.dev
MAIL_PORT=587
MAIL_USERNAME=admin@fobs.dev
MAIL_PASSWORD=votre_mot_de_passe
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@fobs.dev
MAIL_FROM_NAME="FobsDev"
```

## 🎯 Redirections

### Dans .htaccess

```apache
# Force HTTPS
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Redirect www to non-www
RewriteCond %{HTTP_HOST} ^www\.(.*)$ [NC]
RewriteRule ^(.*)$ https://%1/$1 [R=301,L]
```

## 📝 Notes Importantes

1. **Environnement Local** : Gardez `APP_URL=http://localhost` en local
2. **Environnement Production** : `APP_URL=https://fobs.dev` sur le serveur
3. **Cache** : Après modification de `.env`, exécuter `php artisan config:cache`
4. **Git** : Ne jamais commit le fichier `.env` (déjà dans `.gitignore`)

## 🚀 Déploiement

Voir `DEPLOYMENT.md` pour les instructions complètes de déploiement.

---

**Dernière mise à jour** : 26 novembre 2025  
**Contact** : fobsboreil@gmail.com
