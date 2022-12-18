### Требования
Для работы требуется `docker-compose`
### Установка
Конфигурируем composer (выполнить из каталога проекта) `docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php80-composer:latest composer install --ignore-platform-reqs`

Устанавливаем docker и все зависимости `make setup`
### Запуск
Запускаем окружение `make start`

Останавливаем окружение `make stop`

