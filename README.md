### Требования
Для работы требуется `docker-compose`
### Первый запуск
Конфигурируем composer (выполнить из каталога проекта) `docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php80-composer:latest composer install --ignore-platform-reqs`

Копируем файл конфигурации (для упрощения внесены все данные для запуска) `copy-env`

Запускаем сервер `make start`

Генерируем ключ приложение + ключ для JWT `make generate`

Создаем структуру DB `make migrate`

Заполняем DB `make seed`
### Запуск
Запускаем окружение `make start`

Останавливаем окружение `make stop`

