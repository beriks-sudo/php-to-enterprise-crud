<?php
require_once __DIR__ . '/../src/products.php';

$products = [
    ['id' => 1, 'name' => 'apple', 'price' => 330000, 'is_active' => true ],
    ['id' => 2, 'name' => 'samsung', 'price' => 12000, 'is_active' => false ],
    ['id' => 3, 'name' => 'xiaomi', 'price' => 12000, 'is_active' => true ],
];

$payload = [
    'name' => "Keyboard",
    'price' => 12000,
    'quantity' => 5,
    'status' => 'active',
];

[ $products, $product ] = createProduct($products, $payload);
var_dump($products);

$find = findProductById($products, 2);
var_dump($find);

$update = updateProduct($products, 2, ['is_active' => false]);
var_dump($update);

$delete = deleteProduct($products, 3);
var_dump($delete);
