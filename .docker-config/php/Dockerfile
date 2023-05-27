FROM nystudio107/spin-up-statamic-base:8.1-alpine

WORKDIR /var/www

COPY ./run_queue.sh .
RUN chmod a+x run_queue.sh \
    && \
    mkdir -p /var/www/project/storage \
    && \
    chown -R www-data:www-data /var/www/project &> /dev/null || true
COPY ./composer_install.sh .
RUN chmod a+x composer_install.sh
COPY ./banner_message.sh .
RUN chmod a+x banner_message.sh

WORKDIR /var/www/project

# Run the composer_install.sh script that will do a `composer install`:
# - If `composer.lock` is missing
# - If `vendor/` is missing
# ...then start up php-fpm. The `run_queue.sh` script in the queue container
# will take care of running any pending migrations and apply any Project Config changes,
# as well as set permissions via an async CLI process
CMD /var/www/composer_install.sh \
    && \
    php-fpm
