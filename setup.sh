#!/usr/bin/bash
docker compose exec app sh -c "php artisan key:gen;php artisan config:cache;php artisan migrate && php artisan db:seed"