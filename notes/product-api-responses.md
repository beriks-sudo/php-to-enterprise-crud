# Product API responses

Проверка выполнена локально через встроенный PHP-сервер. Для сценария был создан товар с `id = 3`, затем он был прочитан, обновлён и удалён.

## GET /products

### Request

```bash
curl -i http://127.0.0.1:8765/products
```

### Response

```http
HTTP/1.1 200 OK
Content-Type: application/json
```

```json
{
  "data": [
    {
      "id": 1
    },
    {
      "id": 2,
      "name": "Mouse"
    }
  ]
}
```

## POST /products

### Request

```bash
curl -i -X POST http://127.0.0.1:8765/products \
  -H "Content-Type: application/json" \
  -d '{"name":"Review Test Keyboard","price":12000,"is_active":true}'
```

### Response

```http
HTTP/1.1 201 Created
Content-Type: application/json
```

```json
{
  "data": {
    "id": 3,
    "name": "Review Test Keyboard",
    "price": 12000,
    "is_active": true
  }
}
```

## GET /products/3

### Request

```bash
curl -i http://127.0.0.1:8765/products/3
```

### Response

```http
HTTP/1.1 200 OK
Content-Type: application/json
```

```json
{
  "data": {
    "id": 3,
    "name": "Review Test Keyboard",
    "price": 12000,
    "is_active": true
  }
}
```

## PUT /products/3

### Request

```bash
curl -i -X PUT http://127.0.0.1:8765/products/3 \
  -H "Content-Type: application/json" \
  -d '{"name":"Review Test Mechanical Keyboard","price":20000,"is_active":true}'
```

### Response

```http
HTTP/1.1 200 OK
Content-Type: application/json
```

```json
{
  "data": {
    "id": 3,
    "name": "Review Test Mechanical Keyboard",
    "price": 20000,
    "is_active": true
  }
}
```

## DELETE /products/3

### Request

```bash
curl -i -X DELETE http://127.0.0.1:8765/products/3
```

### Response

```http
HTTP/1.1 200 OK
Content-Type: application/json
```

```json
{
  "data": {
    "id": 3,
    "name": "Review Test Mechanical Keyboard",
    "price": 20000,
    "is_active": true
  }
}
```

## GET /products/999999 — товар не найден

### Request

```bash
curl -i http://127.0.0.1:8765/products/999999
```

### Response

```http
HTTP/1.1 404 Not Found
Content-Type: application/json
```

```json
{
  "error": "Product not found"
}
```
