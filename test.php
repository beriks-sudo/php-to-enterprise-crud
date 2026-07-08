<?php

$products = [
    [
        'id' => 1,
        'name' => 'Keyboard'
    ],
    [
        'id' => 2,
        'name' => 'Mouse'
    ],
];

$targetId = 2;
$foundProduct = null;

foreach ($products as $product) {
    if ($product['id'] === $targetId) {
        $foundProduct = $product;
        break;
    }
}

var_dump($foundProduct);