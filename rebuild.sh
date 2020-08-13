#!/bin/bash
curl https://getcomposer.org/installer > composer-setup.php
#export HOME=/home/username && ea-php72 -c php.ini composer-setup.php
ea-php72 -c php.ini composer-setup.php
ea-php72 -r "unlink('composer-setup.php');"
ea-php72 -c php.ini composer.phar install
ea-php72 -r "unlink('composer.phar');"
mv app/Http/Controllers app/Http/Controllersx
ea-php72 artisan crud:rebuild
mv app/Http/Controllersx app/Http/Controllers