### Требования
Для работы требуется `docker-compose`
### Первый запуск
Конфигурируем composer (выполнить из каталога проекта) `docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php80-composer:latest composer install --ignore-platform-reqs`

Копируем файл конфигурации (для упрощения внесены все данные для запуска) `make copy-env`

Запускаем сервер `make start`

Создаем структуру DB `make migrate`

Заполняем DB `make seed`
### Запуск
Запускаем окружение `make start`

Останавливаем окружение `make stop`

### Postman
Доступные логины - `admin@gmail.com`, `editor@gmail.com`, `user@gmail.com`
Пароль - `password`

