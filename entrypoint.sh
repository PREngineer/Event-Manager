#!/bin/sh

# Exit on unset variables and on command failures
set -eu

echo '[...] Grabbing environment variables'

SERVER_ADMIN="${SERVER_ADMIN:-you@example.com}"
HTTP_SERVER_NAME="${HTTP_SERVER_NAME:-www.example.com}"
HTTPS_SERVER_NAME="${HTTPS_SERVER_NAME:-www.example.com}"
LOG_LEVEL="${LOG_LEVEL:-info}"
TZ="${TZ:-UTC}"

PHP_INI="/etc/php84/php.ini"

if [ ! -f "$PHP_INI" ]; then
    echo "[ERROR] PHP configuration not found: $PHP_INI" >&2
    exit 1
fi

echo '[...] Updating configurations'

# Configure Apache HTTP settings
sed -i "s#ServerAdmin you@example.com#ServerAdmin ${SERVER_ADMIN}#g" /etc/apache2/httpd.conf
sed -i "s#^#ServerName ${HTTP_SERVER_NAME}#" /dev/null 2>/dev/null || true
sed -i 's/#ServerName www.example.com:80/ServerName www.example.com:80/' /etc/apache2/httpd.conf
sed -i 's#^DocumentRoot ".*#DocumentRoot "/app"#g' /etc/apache2/httpd.conf
sed -i 's#Directory "/var/www/localhost/htdocs"#Directory "/app"#g' /etc/apache2/httpd.conf
sed -i 's#AllowOverride None#AllowOverride All#' /etc/apache2/httpd.conf

# Send Apache logs to stdout and stderr
sed -i 's#^ErrorLog .*#ErrorLog "/dev/stderr"\nTransferLog "/dev/stdout"#g' /etc/apache2/httpd.conf
sed -i 's#CustomLog .* combined#CustomLog "/dev/stdout" combined#g' /etc/apache2/httpd.conf

# Configure SSL logs and document root
sed -i 's#^ErrorLog .*#ErrorLog "/dev/stderr"#g' /etc/apache2/conf.d/ssl.conf
sed -i 's#^TransferLog .*#TransferLog "/dev/stdout"#g' /etc/apache2/conf.d/ssl.conf
sed -i 's#^DocumentRoot ".*#DocumentRoot "/app"#g' /etc/apache2/conf.d/ssl.conf

# Configure SSL server settings
sed -i "s#ServerAdmin you@example.com#ServerAdmin ${SERVER_ADMIN}#g" /etc/apache2/conf.d/ssl.conf
sed -i "s#ServerName www.example.com:443#ServerName ${HTTPS_SERVER_NAME}:443#g" /etc/apache2/conf.d/ssl.conf

# Configure HTTP ServerName and LogLevel
if grep -q '^ServerName ' /etc/apache2/httpd.conf; then
    sed -i "s#^ServerName .*#ServerName ${HTTP_SERVER_NAME}:80#" /etc/apache2/httpd.conf
else
    printf '\nServerName %s:80\n' "$HTTP_SERVER_NAME" >> /etc/apache2/httpd.conf
fi

if grep -q '^LogLevel ' /etc/apache2/httpd.conf; then
    sed -i "s#^LogLevel .*#LogLevel ${LOG_LEVEL}#" /etc/apache2/httpd.conf
else
    printf '\nLogLevel %s\n' "$LOG_LEVEL" >> /etc/apache2/httpd.conf
fi

# Enable commonly used Apache modules if currently commented out
sed -i 's/^#LoadModule rewrite_module/LoadModule rewrite_module/' /etc/apache2/httpd.conf
sed -i 's/^#LoadModule deflate_module/LoadModule deflate_module/' /etc/apache2/httpd.conf
sed -i 's/^#LoadModule expires_module/LoadModule expires_module/' /etc/apache2/httpd.conf

# Configure PHP timezone
if grep -q '^;*date.timezone' "$PHP_INI"; then
    sed -i "s#^;*date.timezone.*#date.timezone = \"${TZ}\"#" "$PHP_INI"
else
    printf '\ndate.timezone = "%s"\n' "$TZ" >> "$PHP_INI"
fi

echo '[...] Validating Apache configuration'
httpd -t

echo '[...] Starting Apache'
exec httpd -D FOREGROUND