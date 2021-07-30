#!/bin/bash

composer install
composer dump-autoload
php artisan route:cache
php artisan config:cache