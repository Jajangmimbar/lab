git clone https://github.com/fheryfebrians/lab.git

cd lab

composer install

php artisan key:generate

setting database di file .env

php artisan migrate

localhost/lab/public