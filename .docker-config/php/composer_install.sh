#!/bin/sh

# Composer Install shell script
#
# This shell script runs `composer install` if either the `composer.lock` file or
# the `vendor/` directory is not present`
#
# @author    nystudio107
# @copyright Copyright (c) 2023 nystudio107
# @link      https://nystudio107.com/
# @license   MIT

# Ensure permissions on directories Statamic needs to write to
chown -R www-data:www-data /var/www/project/storage
chown -R www-data:www-data /var/www/project/public
# Check for `composer.lock` & `vendor/`
cd /var/www/project
if [ ! -f "composer.lock" ] || [ ! -d "vendor" ] || [ ! -f "vendor/autoload.php" ]; then
    chown -R www-data:www-data /var/www/project
    su-exec www-data composer install --verbose --no-progress --no-scripts --no-interaction
fi
# Create a security key if it doesn't exist already
if [ -z "$APP_KEY" ] ; then
    su-exec www-data php artisan key:generate
fi
exit 0
