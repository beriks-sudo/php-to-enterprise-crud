>request line
GET /products?limit=5&page=2 HTTP/1.1 
> 
> request header
> Host: localhost:8000
> User-Agent: curl/8.7.1
> Accept: */*


status line
HTTP/1.1 200 OK

response header
Host: localhost:8000
Date: Wed, 01 Jul 2026 10:59:00 GMT
Connection: close
X-Powered-By: PHP/8.5.6
Content-Type: application/json

body
{
"method": "GET",
"uri": "\/products?limit=5&page=2",
"query": {
"limit": "5",
"page": "2"
}
}%

список товаров GET    /products     идемпотентна   -> 200 OK
получение одного товара GET    /products/10  идемпотентна   -> 200 OK или 404 Not Found
создание товара POST   /products     идемпотентна   -> 201 Created или 422 Unprocessable Content
полное обновление товара PUT    /products/10  неидемпотентна   -> 200 OK, 404 Not Found или 422 Unprocessable Content
частичное обновление товара PATCH  /products/10  идемпотентна   -> 200 OK, 404 Not Found или 422 Unprocessable Content
удаление товара DELETE /products/10  идемпотентна   -> 204 No Content или 404 Not Found