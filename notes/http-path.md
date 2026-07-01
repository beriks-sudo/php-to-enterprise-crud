nslookup example.com
curl -I https://example.com
curl -v https://example.com


Своими словами описать путь запроса из 7-10 шагов.

клиент обращается к серверу по url, браузер разбирает url на части, браузер обращается к dns и получает ip, потом идет обращение к tcp и tls handshake, отправляет http запрос



Отдельно объяснить роли URL, DNS, IP, TCP, TLS, HTTP, headers.
url - адрес сайта, нужен для перехода
dns - нужен для получения ip по доменному имени
ip - адрес компьютера или сервера в интернете или интернет протокол
tcp- нужен для установления соединения 
tls - нужен для передачи защифрованных данных
http - письмо которое отправляется после соеденения 
headers -это служебная информация, которая передается в виде текстовых пар «ключ: значение» между браузером (клиентом) и сервером

Вставить 3-5 строк из вывода команд, которые подтверждают наблюдения.

Server:         100.100.100.100
Address:        100.100.100.100#53

Non-authoritative answer:
Name:   example.com
Address: 8.6.112.0
Name:   example.com
Address: 8.47.69.0

HTTP/2 200
date: Wed, 01 Jul 2026 10:07:52 GMT
content-type: text/html
server: cloudflare
last-modified: Tue, 30 Jun 2026 20:58:35 GMT
allow: GET, HEAD
accept-ranges: bytes
age: 2456
cf-cache-status: HIT
cf-ray: a1449b2f4876dc3d-AKX