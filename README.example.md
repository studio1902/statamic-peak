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

## Deploy script

```bash
if [[ $FORGE_DEPLOY_MESSAGE =~ "[BOT]" ]]; then
    echo "AUTO-COMMITTED ON PRODUCTION. NOTHING TO DEPLOY."
    exit 0
fi

cd /home/forge/site.ext
git pull origin main
composer install --no-interaction --prefer-dist --optimize-autoloader
npm i
npm run production
php artisan cache:clear
php artisan config:cache
php artisan statamic:stache:warm
php artisan statamic:static:clear
php artisan warm
php artisan statamic:assets:generate-presets

( flock -w 10 9 || exit 1
    echo 'Restarting FPM...'; sudo -S service $FORGE_PHP_FPM reload ) 9>/tmp/fpmlock
```