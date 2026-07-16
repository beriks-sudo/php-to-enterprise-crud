<?php
$products = [
    ['id' => 1,
    'name' => 'Keyboard',
    'price' => 12000,
    'is_active' => true
    ],
    ['id' => 2,
     'name' => 'Mouse',
     'price' => 15000,
    'is_active' => true
    ]
];

function getNextProductId(array $products): int {
    $maxId = 0;
    foreach ($products as $product) {
        if (($product['id'] ?? 0) > $maxId) {
            $maxId = $product['id'];
        }
    }
    return $maxId + 1;
}

echo getNextProductId($products);

function getProductByid(array $products, int $id): ?array {
    foreach ($products as $product) {
        if ($product['id'] === $id) {
            return $product;
        }
    }
    return null;
}

echo getProductByid($products, 2)['name'];

$payload = [
    'name' => 'Monitor',
    'price' => 12000,
    'is_active' => true,
];

function createProduct(array $products, array $payload): array {
    $product = [
        'id' => getNextProductId($products),
        'name' => trim( (string) ($payload['name'] ?? '')),
        'price' => (int) ($payload['price'] ?? 0),
        'is_active' => (bool) ($payload['is_active'] ?? true)
    ];
    $products[] = $product;
    return [$products, $product];
}

[ $products, $product ] = createProduct($products, $payload);
var_dump($products);