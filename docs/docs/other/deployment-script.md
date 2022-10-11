# Deployment script

You can use the following deployment scripts together with Peak to make sure everything runs smoothly after a deploy.

## Deploy script Ploi

```bash
if [[ {COMMIT_MESSAGE} =~ "[BOT]" ]]; then
    echo "Automatically committed on production. Nothing to deploy."
    {DO_NOT_NOTIFY}
    # Uncomment the following line when using zero downtime deployments.
    # {CLEAR_NEW_RELEASE}
    exit 0
fi

cd {SITE_DIRECTORY}
git pull origin main
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

npm ci
npm run build
php{SITE_PHP_VERSION} artisan cache:clear
php{SITE_PHP_VERSION} artisan config:cache
php{SITE_PHP_VERSION} artisan route:cache
php{SITE_PHP_VERSION} artisan statamic:stache:warm
php{SITE_PHP_VERSION} artisan queue:restart
php{SITE_PHP_VERSION} artisan statamic:search:update --all
php{SITE_PHP_VERSION} artisan statamic:static:clear
php{SITE_PHP_VERSION} artisan statamic:static:warm --queue

{RELOAD_PHP_FPM}

echo "🚀 Application deployed!"
```

## Deploy script Forge

```bash
if [[ $FORGE_DEPLOY_MESSAGE =~ "[BOT]" ]]; then
    echo "Automatically committed on production. Nothing to deploy."
    exit 0
fi

cd $FORGE_SITE_PATH
git pull origin main
$FORGE_COMPOSER install --no-interaction --prefer-dist --optimize-autoloader --no-dev

npm ci
npm run build
$FORGE_PHP artisan cache:clear
$FORGE_PHP artisan config:cache
$FORGE_PHP artisan route:cache
$FORGE_PHP artisan statamic:stache:warm
$FORGE_PHP artisan queue:restart
$FORGE_PHP artisan statamic:search:update --all
$FORGE_PHP artisan statamic:static:clear
$FORGE_PHP artisan statamic:static:warm --queue

( flock -w 10 9 || exit 1
    echo 'Restarting FPM...'; sudo -S service $FORGE_PHP_FPM reload ) 9>/tmp/fpmlock
```
