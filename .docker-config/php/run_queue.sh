#!/bin/sh

# Run Queue shell script
#
# This shell script runs the Statamic queue via `php artisan:work`
# It waits until the database container responds, then runs the queue
# listener that listens for and runs pending queue jobs
#
# @author    nystudio107
# @copyright Copyright (c) 2023 nystudio107
# @link      https://nystudio107.com/
# @license   MIT

cd /var/www/project
# Wait until the `composer install` is done by looking for the `vendor/autoload.php` file
echo "### Waiting for vendor/autoload.php"
while [ ! -f "composer.lock" ] || [ ! -d "vendor" ] || [ ! -f "vendor/autoload.php" ]
do
  sleep 5
done
# Ensure permissions on directories Statamic needs to write to
chown -R www-data:www-data /var/www/project/storage
chown -R www-data:www-data /var/www/project/public
# Banner message
source '/var/www/banner_message.sh'
# Run a queue worker
su-exec www-data php artisan queue:work
exit 0
