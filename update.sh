php artisan down

composer dump-autoload
composer update --no-interaction

php artisan config:clear
php artisan cache:clear

php artisan migrate

#npm install
#npm run prod

php artisan up
