# site.ext

## Installation instructions

1. run `composer install`
2. run `php please make:user`
3. run `npm i` && `npm run watch` (or `npm run dev`)

## Environment file contents

### Development

```env
Dump your .env values here with senstive data removed.
```

### Production

```env
Dump your .env values here with senstive data removed.
```

## NGINX config

Add the following to your NGINX config to enable static resource caching:

```
location ~* ^/(assets|img|themes)/.+\.(jpe?g|webp|gif|png|css|js|ico|xml|svg|woff|woff2?)(\?|$) {
    expires 30d;
}
```

## Deploy script Ploi

```bash
if [[ {COMMIT_MESSAGE} =~ "[BOT]" ]]; then
    echo "Automatically committed on production. Nothing to deploy."
    exit 0
fi

cd /home/ploi/site.ext
git pull origin main
composer install --no-interaction --prefer-dist --optimize-autoloader

npm i
npm run production
php{SITE_PHP_VERSION} artisan cache:clear
php{SITE_PHP_VERSION} artisan config:cache
php{SITE_PHP_VERSION} artisan statamic:stache:warm
php{SITE_PHP_VERSION} please search:update --all
php{SITE_PHP_VERSION} artisan statamic:static:clear
php{SITE_PHP_VERSION} artisan warm
php{SITE_PHP_VERSION} artisan statamic:assets:generate-presets

{RELOAD_PHP_FPM}

echo "🚀 Application deployed!"
```

## Deploy script Forge

```bash
if [[ $FORGE_DEPLOY_MESSAGE =~ "[BOT]" ]]; then
    echo "Automatically committed on production. Nothing to deploy."
    exit 0
fi

cd /home/forge/site.ext
git pull origin main
composer install --no-interaction --prefer-dist --optimize-autoloader

npm i
npm run production
{SITE_PHP_VERSION} artisan cache:clear
{SITE_PHP_VERSION} artisan config:cache
{SITE_PHP_VERSION} artisan statamic:stache:warm
{SITE_PHP_VERSION} please search:update --all
{SITE_PHP_VERSION} artisan statamic:static:clear
{SITE_PHP_VERSION} artisan warm
{SITE_PHP_VERSION} artisan statamic:assets:generate-presets

( flock -w 10 9 || exit 1
    echo 'Restarting FPM...'; sudo -S service $FORGE_PHP_FPM reload ) 9>/tmp/fpmlock
```
