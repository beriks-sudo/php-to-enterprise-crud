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