# Deployment script

You can use the following deployment script together with Peak to make sure everything runs smoothly after a deploy.

```bash
php artisan cache:clear # Clear the Laravel application cache.
php artisan config:cache # Clear and refresh the Laravel config cache.
php artisan route:cache # Clear and refresh the Laravel route cache.
php artisan statamic:stache:warm # Warm the Statamic stache.
php artisan queue:restart # Restart the Redis queue.
php artisan statamic:search:update --all # Update the search index.
php artisan statamic:static:clear # Clear the Statamic static cache (if you use this).
php artisan statamic:static:warm --queue # Warm the Statamic static cache (if you use this).
php artisan statamic:assets:generate-presets --queue  # Generate all asset presets.
```
