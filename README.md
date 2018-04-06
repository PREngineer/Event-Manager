# Events Manager

This platform is used to create, manage, and track events and assistance.

# About

This project is designed as a Progressive Web App.  This means that the project is compatible with most computer web browsers, tablets, and mobile devices while not requiring licensing with Google or Apple to be deployed through their stores.

It consists of a Web Server component and a Database component.  The Web Server component is used to display a user interface and reporting.  The Database component is used to hold the data of interest.

Admin authentication is done through an Azure Active Directory.

Core web development technologies include:
  * HTML
  * CSS
  * JavaScript
  * PHP 7

Libraries/Frameworks used:
  * Bootstrap v.3.3.7 [Stable]
    * Bootstrap coding resources:

      http://getbootstrap.com/docs/3.3/components/#input-groups

      https://www.w3schools.com/Bootstrap/default.asp

  * jQuery-3

# How to Install (Ubuntu Server)

  * Step 1 - Install MySQL

    Run:

    sudo apt-get install -y mysql-server mysql-client

    You will be prompted to create a database password for the root user.

    Run:

    mysql_secure_installation

    You will be prompted:
      * Change the root password:        n
      * Remove anonymous users:          y
      * Disallow root login remotely:    y
      * Remove test database and access: y
      * Reload privilege tables:         y

  * Step 2 - Install Nginx

    sudo apt-get install -y nginx

    Default web directory could be:
      * usr/share/nginx/html/ <-- Usually this
      * /var/www/html/

  * Step 3 - Install PHP 7

    Run:

    sudo add-apt-repository ppa:ondrej/php

    sudo apt-get update -y

    All of PHP Modules are:

    php7.0            php7.0-fpm        php7.0-mysql      php7.0-sqlite3
    php7.0-bcmath     php7.0-gd         php7.0-odbc       php7.0-sybase
    php7.0-bz2        php7.0-gmp        php7.0-opcache    php7.0-tidy
    php7.0-cgi        php7.0-imap       php7.0-pgsql      php7.0-xml
    php7.0-cli        php7.0-interbase  php7.0-phpdbg     php7.0-xmlrpc
    php7.0-common     php7.0-intl       php7.0-pspell     php7.0-xsl
    php7.0-curl       php7.0-json       php7.0-readline   php7.0-zip
    php7.0-dba        php7.0-ldap       php7.0-recode     
    php7.0-dev        php7.0-mbstring   php7.0-snmp       
    php7.0-enchant    php7.0-mcrypt     php7.0-soap       

    Select the ones you need.

    sudo apt-get install -y php7.0 php7.0-fpm php7.0-mysql php7.0-curl php7.0-gd php7.0-mcrypt php7.0-sqlite3 php7.0-tidy php-apcu php-mbstring php7.0-mbstring php-gettext php-pear php-imagick php-mcrypt php-mbstring

    sudo service php7.0-fpm restart

  * Step 4a - Configure the default website (HTTP)

    Run:

    sudo nano /etc/nginx/sites-available/default

    Replace its contents with:

        server {
        listen 80 default_server;
        listen [::]:80 default_server;

        root /usr/share/nginx/html/;
        index index.php index.html index.htm;

        # Make site accessible from http://localhost/
        server_name localhost;

        location / {
                try_files $uri $uri/ =404;
        }

        error_page 404 /404.html;

        error_page 500 502 503 504 /50x.html;

        location = /50x.html {
                root /usr/share/nginx/html;
        }

        location ~ \.php$ {
                try_files $uri $uri/ =404;

                fastcgi_pass unix:/run/php/php7.0-fpm.sock;
                include fastcgi_params;
        }

        location ~ /\.ht {
                deny all;
        }
        }


    Run:

    service nginx restart

  * Step 5 - Configure PHP-FPM

    Run:

    sudo nano /etc/php/7.0/fpm/php.ini

    Press 'CTRL + W' to search

    Type: cgi.fix_pathinfo

    Press Enter

    Change

    ;cgi.fix_pathinfo=1;

    to

    cgi.fix_pathinfo=0;

    Run:

    sudo service php7.0-fpm restart

  * Step 6 - Install Git

    Run:

    sudo apt-get install -y git

  * Step 7 - Clone the Event Manager

    Run:

    cd /usr/share/nginx/html
    git clone https://github.com/PREngineer/Event-Manager.git
    cd ..
    sudo chmod -R 777 html

  * Step 8 - Get rid of Apache

    Run:

    sudo apt-get purge -y apache2

  * Step 9 - Configure PHP My Admin

    Run:

    sudo apt-get install -y phpmyadmin
    sudo phpenmod mcrypt
    sudo phpenmod mbstring
    sudo ln -s /usr/share/phpmyadmin /usr/share/nginx/html

  * Step 10 - Set Time Zone

    Run:

    sudo dpkg-reconfigure tzdata

    Follow instructions to pick the right time zone.

    Run:

    sudo nano /etc/php/7.0/fpm/php.ini

    Press 'CTRL + W' to search

    Type: date.timezone

    Press Enter

    Change

    ;date.timezone = '';

    to

    ;date.timezone = 'America/New_York';

    Run:

    sudo service php7.0-fpm restart

# Important Considerations:

  * Links do not work like they do normally!
    The links' "href" property has been removed and replaced by a "link" property that is read by
    the JavaScript link handler function.
    This is done because we do not want a complete reload of a new page.  We just care about
    replacing the content of a DIV that represents the content of the pages.  We want to maintain the same navigation menu and footer.
    This also allows for better management of code in different locations without having a
    negative effect on others.

# The Team

  * Carlo Burgos
  * Jean Mendez
  * Emmanuel Munet
  * Joaquin Ortiz
  * Jorge Pabon
