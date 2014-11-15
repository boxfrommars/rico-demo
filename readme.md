## Requirements

* PHP >= 5.4
* MCrypt PHP Extension

### Install

    xu@calypso:~$ git clone https://github.com/boxfrommars/rico.git
    xu@calypso:~$ cd rico/

создаём бд (если изменили здесь параметры бд, то меняем их в кофигурации в файле `.env.(local.)php)`

    mysql> CREATE USER 'rico'@'localhost' IDENTIFIED BY 'rico';
    mysql> CREATE DATABASE rico;
    mysql> GRANT ALL PRIVILEGES ON rico . * TO 'rico'@'localhost';
    mysql> FLUSH PRIVILEGES;

настраиваем

    xu@calypso:~$ cp example.env.php .env.php // файл конфигурации текущей машины (если используем окружение local, то: cp example.env.php .env.local.php )

устанавливаем зависимости

    xu@calypso:~$ composer update

Открываем папки для записи сервером (я тут по-простому сделал, можно аккуратнее -- только серверу)

    xu@calypso:~$ chmod a+rw app/storage -R // папка для хранения логов, кеша и всего такого
    xu@calypso:~$ chmod a+rw public/assets/image -R // папка для загрузки пользовательских изображений
    xu@calypso:~$ chmod a+rw public/assets/file -R // папка для загрузки пользовательских файлов

если нет дампа, то

    xu@calypso:~$ php artisan migrate
    xu@calypso:~$ php artisan db:seed // тестовые данные, чтобы обновить миграции и данные: `php artisan migrate:refresh --seed`

создастся тестовый пользователь-администратор с логином/паролем boxfrommars@gmail.com/test, изменить эти данные можно
в файле `app/database/seeds/UserTableSeeder.php`

    // если не настроен апач или нгинкс, то можно запустить сервер (не использовать на продакшене и тесте, только во время разработки)
    xu@calypso:~$ php artisan serve --port 8444 // или любой другой незанятый порт, по умолчанию 8000
    // теперь сайт доступен по адресу http://localhost:8444

Для установки тестового окружения (`local`), добавьте в массив `$env` файла `bootstrap/start.php` имя своего компьютера (определяется командой `hostname`)
В тестовом окружении будет доступна дебагбар-панель

# Демо

* http://rico.boxfrommars.ru/admin админка
* http://rico.boxfrommars.ru/angular-app пример rest-приложения

# Overview

* роуты лежат в файле `app/routes.php`
* виды в папке -- `app/views`
* базовый crud контроллер -- `app/Rico/Dashboard/Controllers/CrudController.php`
* текущая структура данных в `docs/db-schema.dia`