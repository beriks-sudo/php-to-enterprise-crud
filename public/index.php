<?php
require_once __DIR__ . '/../src/products.php';

function jsonResponse(array $payload, int $statusCode = 200): void
{
    http_response_code($statusCode);
    header('Content-Type: application/json');

    echo json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

function readJsonBody(): array
{
    $rawBody = file_get_contents('php://input');

    if ($rawBody === false || trim($rawBody) === '') {
        return [];
    }

    return json_decode($rawBody, true, 512, JSON_THROW_ON_ERROR);
}

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
$segments = array_values(array_filter(explode('/', $path)));

$resource = $segments[0] ?? null;
$id = isset($segments[1]) ? (int) $segments[1] : null;

$storagePath = productsStoragePath();
$products = loadProducts($storagePath);

// Список товаров
if ($method === 'GET' && $resource === 'products' && $id === null) {
    jsonResponse(['data' => $products]);
    return;
}

// Один товар
if ($method === 'GET' && $resource === 'products' && $id !== null) {
    $product = findProductById($products, $id);

    if ($product === null) {
        jsonResponse(['error' => 'Product not found'], 404);
        return;
    }

    jsonResponse(['data' => $product]);
    return;
}

if ($method === 'POST' && $resource === 'products' && $id === null) {
    $payload = readJsonBody();
    $errors = validateProductPayload($payload);
    if ($errors !== []) {
        jsonResponse(['errors' => $errors], 422);
        return;
    }
    [$products, $product] = createProduct($products, $payload);
    saveProducts($storagePath, $products);
    jsonResponse(['data' => $product], 201);
    return;
}

if ($method === 'PUT' && $resource === 'products' && $id !== null) {
    if (findProductById($products, $id) === null) {
        jsonResponse(['error' => 'Product not found'], 404);
        return;
    }
    $payload = readJsonBody();
    $errors = validateProductPayload($payload);
    if ($errors !== []) {
        jsonResponse(['errors' => $errors], 422);
        return;
    }
    $products = updateProduct($products, $id, $payload);
    saveProducts($storagePath, $products);
    $updatedProduct = findProductById($products, $id);
    jsonResponse(['data' => $updatedProduct]);
    return;
}

if ($method === 'DELETE' && $resource === 'products' && $id !== null) {
    $product = findProductById($products, $id);
    if ($product === null) {
        jsonResponse(['error' => 'Product not found'], 404);
        return;
    }
    $products = deleteProduct($products, $id);
    saveProducts($storagePath, $products);
    jsonResponse(['data' => $product]);
    return;
}

jsonResponse(['error' => 'Route not found'], 404);
