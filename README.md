## Инструкция запуска проекта
1. Клонировать репозиторий
```
git clone https://github.com/valerie-sidman/booking-service-back.git backend
```
2. Перейти в директорию с проектом
```
cd backend
```
3. Инициализировать проект через **composer**
```
composer install
```
4. В **php.ini** раскомментировать строку с **extension** для **sqlite**
```
extension=pdo_sqlite
```
5. Обновить миграцию
```
php artisan migrate:refresh --database=sqlite_migrate
```
6. Запустить сервер
```
php artisan serve
```
## Версия PHP
***PHP 8.0.3 (cli)***
