#!/bin/sh

# Banner Message shell script
#
# Display a banner message to let the user know the environment is ready for use
#
# @author    nystudio107
# @copyright Copyright (c) 2023 nystudio107
# @link      https://nystudio107.com/
# @license   MIT

# Rewrite the PRIMARY_SITE_URL env var if we're running in Codespaces
if [[ ! ${CODESPACES:-"unset"} == "unset" ]]; then
    export APP_URL="https://${CODESPACE_NAME}-${DEV_SERVER_PORT}.${GITHUB_CODESPACES_PORT_FORWARDING_DOMAIN}/"
fi
# Banner message
sleep 1
echo "### Your Statamic site is ready!"
echo "Frontend URL: ${APP_URL}"
echo "CP URL: ${APP_URL}cp"
echo "CP User: ${STATAMIC_CP_USER}"
echo "CP Password: ${STATAMIC_CP_PASSWORD}"
