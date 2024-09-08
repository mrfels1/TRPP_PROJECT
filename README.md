Коллабораторы: 
MrFels1 - Дмитрий Хакимов;
BloodMistress - Алина Миронова;


Запуск проекта:
1. Из корня проекта создать контейнер: `docker compose build`
2. Запустить его: `docker compose up -d`
5. В папке src создайте копию файла .env.example убрав .example
6. В случае если у вас не установлены php8.2-xml и php8.2-curl установите их или активируйте в php.ini в вашей системе.
7. Используя терминал, установить зависимости php composer, перейдите в src (cd src): `composer update` а после `composer install`
8. Убедитесь что у вас установлен node версии 22.6.0 и старше
9. Установить зависимости node: `npm install`
10. Скомпилировать ресурсы: `npm run build`
11. Провести миграции, вернитесь на один уровень выше: `docker-compose exec app php artisan migrate`
12. Сгенерировать ключ: `docker-compose exec app php artisan key:generate`
13. Перейдите на `localhost:8080`, там и будет запущен сайт

Подключение PGAdmin
1. Перейдите на localhost:5050, логин mrfelsgc@gmail.com пароль password
2. Создайте сервер server1 с host name/address db и портом 5432 установите имя пользователя и пароль: defuser DimasRealnoYmniy

Генерация документации: `docker-compose exec app php artisan openapi:generate`

Зависимости:
- Composer
- PostgreSQL
- npm
- "php": "^8.2",
- php8.2-xml
- php8.2-curl
- "inertiajs/inertia-laravel": "^1.0",
- "laravel/framework": "^11.0",
- "laravel/sanctum": "^4.0",
- "laravel/tinker": "^2.9",
- "laravel/ui": "^4.5",
- "tartanlegrand/laravel-openapi": "^1.13"
