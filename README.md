## Мультиязычная локализация

## Установка

1. Клонировать проект
2. Подключить алиас для ```sail``` [Документация](https://laravel.com/docs/10.x/sail#configuring-a-shell-alias)
3. Скопировать .env.example в .env, при необходиемости внести изменения
4. Поднять докер контейнеры ```sail up -d --build```
5. Установить composer зависимости ```sail composer install```
6. Запустить миграции ```sail artisan migrate --seed```
7. Установить переводы ```sail artisan install```
8. Запустить сервер ```sail artisan serve```
9. Открыть адрес [localhost](http://localhost)
