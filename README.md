composer

php -v

composer create-project laravel/laravel test1

composer create-project --prefer-dist laravel/laravel laravel_crud

php artisan serve

http://localhost:8000/



php artisan make:migration create_boards_table --create=boards

php artisan migrate

php artisan make:controller BoardsController --resource --model=Board

