Коллабораторы: 
MrFels1 - Дмитрий Хакимов;
BloodMistress - Алина Миронова;

Запуск проекта:
1. Установите php 8.2+ : https://www.php.net/downloads
2. Установите composer : https://getcomposer.org/download/
3. Установите postgresql : https://www.postgresql.org/download/
4. Создайте бд maindb, пользователя dbuser с паролем dbuser, с помощью pgadmin4
5. Скопируйте .env-example после чего переименуйте в .env
6. Установите зависимости: `npm install laravel-vite-plugin` `composer install`
7. Скомпилируйте ассеты `npm run build`
8. Проведите миграцию: `php artisan migrate --seed`
9. Запустите проект: `php artisan serve`

Генерация документации: `php artisan openapi:generate`

Зависимости:
- Composer
- PostgreSQL
- "php": "^8.2",
- "inertiajs/inertia-laravel": "^1.0",
- "laravel/framework": "^11.0",
- "laravel/sanctum": "^4.0",
- "laravel/tinker": "^2.9",
- "laravel/ui": "^4.5",
- "tartanlegrand/laravel-openapi": "^1.13"
