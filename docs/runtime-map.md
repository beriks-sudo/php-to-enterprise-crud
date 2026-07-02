Browser -> nginx -> php-fpm -> public/index.php -> response
Под каждым звеном написать его ответственность.
Browser направляет запрос requests
nginx обрабатывает http и направляет в php-fpm
php-fpm получает запрос от nginx и направляет в php код
public/index.php front controller laravel
response отдаем ответ клиенту browser

Объяснить, почему root должен смотреть в public.
если дать доступ ко всему проекту можно произвести утечку .env .git и т.д.

Объяснить, почему storage, .env, vendor не должны быть публичными.
в них могут быть ключи или секретная информация которую никто не должен видеть кроме вашей команды

Если Docker-окружение уже есть, добавить команды:
docker compose ps
docker compose logs nginx
docker compose logs php-fpm
curl -i http://localhost