# Export the `.env` variables to sub-commands
include .env
export $(shell sed 's/=.*//' .env)
INITIAL_SERVER_PORT?=8050
# Dummy empty values for Codespaces to avoid warnings from Docker
CODESPACES?=
CODESPACE_NAME?=
GITHUB_CODESPACES_PORT_FORWARDING_DOMAIN?=
export CODESPACES
export CODESPACE_NAME
export GITHUB_CODESPACES_PORT_FORWARDING_DOMAIN

.PHONY: artisan clean composer dev npm nuke ssh statamic up

# Execute an artisan command in the PHP container
artisan: up
	docker compose exec -it php su-exec www-data php artisan \
		$(filter-out $@,$(MAKECMDGOALS)) $(MAKEFLAGS)
# Remove `vendor/` & `composer.lock`
clean:
	rm -f composer.lock
	rm -rf vendor/
# Execute a composer command in the PHP container
composer: up
	docker compose exec -it php su-exec www-data composer \
		$(filter-out $@,$(MAKECMDGOALS)) $(MAKEFLAGS)
# Start the dev server
dev: up
# Execute an npm command in the PHP container
npm: up
	docker compose exec -it php su-exec www-data npm \
		$(filter-out $@,$(MAKECMDGOALS)) $(MAKEFLAGS)
# Remove the Docker volumes & start clean
nuke: clean
	cp -n example.env .env; \
	docker compose down -v
	if ! command -v nc &>/dev/null ; then \
		DEV_SERVER_PORT="$${DEV_SERVER_PORT:=$(INITIAL_SERVER_PORT)}"; \
		export DEV_SERVER_PORT; \
	else \
		port=$(INITIAL_SERVER_PORT); \
		while [ -z "$$DEV_SERVER_PORT" ] ; do \
		  nc -z localhost $$port &>/dev/null || export DEV_SERVER_PORT=$$port; \
		  ((port++)); \
		done; \
		echo "### Using port: $$DEV_SERVER_PORT"; \
	fi; \
	docker compose up --build --force-recreate
# Execute a please command in the PHP container
please: up
	docker compose exec -it php su-exec www-data php please \
		$(filter-out $@,$(MAKECMDGOALS)) $(MAKEFLAGS)
# Open up a shell in the PHP container
ssh:
	docker compose exec -it php su-exec www-data /bin/sh
# Execute a statamic command in the PHP container
statamic: up
	docker compose exec -it php su-exec www-data statamic \
		$(filter-out $@,$(MAKECMDGOALS)) $(MAKEFLAGS)
up:
	if [ ! "$$(docker compose ps --services | grep php)" ]; then \
		if ! command -v nc &>/dev/null ; then \
			DEV_SERVER_PORT="$${DEV_SERVER_PORT:=$(INITIAL_SERVER_PORT)}"; \
			export DEV_SERVER_PORT; \
		else \
	  		port=$(INITIAL_SERVER_PORT); \
			while [ -z "$$DEV_SERVER_PORT" ] ; do \
			  nc -z localhost $$port &>/dev/null || export DEV_SERVER_PORT=$$port; \
			  ((port++)); \
			done; \
			echo "### Using port: $$DEV_SERVER_PORT"; \
		fi; \
		cp -n example.env .env; \
		docker compose up; \
    fi
%:
	@:
# ref: https://stackoverflow.com/questions/6273608/how-to-pass-argument-to-makefile-from-command-line
