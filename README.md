Коллабораторы: 
MrFels1 - Дмитрий Хакимов;
BloodMistress - Алина Миронова;

Запуск проекта:
1. Создать контейнер: `docker-compose build`
2. Запустить его: `docker-compose up -d`
3. Перейдите на localhost:5050, логин mrfelsgc@gmail.com пароль password
4. Создайте сервер server1 с адресом db и портом 5432 установите имя пользователя и пароль из src/.env 
5. Установить зависимости php, перейдите в src (cd src): `composer install`
6. Установить зависимости node: `npm install`
7. Скомпилировать ресурсы: `npm run build`
8. Провести миграции, вернитесь на один уровень выше: `docker-compose exec app php artisan migrate`
9. Сгенерировать ключ: `docker-compose exec app php artisan key:generate`
10. Перейдите на `localhost:8080`, там и будет запущен сайт


Генерация документации: `docker-compose exec app php artisan openapi:generate`

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
