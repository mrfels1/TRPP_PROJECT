Коллабораторы: 
MrFels1 - Дмитрий Хакимов;
BloodMistress - Алина Миронова;
https://miro.com/app/board/uXjVKfZV_j0=/

Запуск проекта:
1. Создайте контейнер `docker-compose build`
2. Запустите его `docker-compose up -d`
3. Перейдите на localhost:5050, логин mrfelsgc@gmail.com пароль password
4. Создайте сервер с адресом db и портом 5432 установите имя пользователя и пароль из src/.env 
5. Скомпилируйте ресурсы `npm run build`
3. Проведите миграции`docker-compose exec app php artisan migrate`

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