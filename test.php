<?php

$products = [
    ['id' => 1, 'name' => 'Keyboard', 'is_active' => true],
    ['id' => 2, 'name' => 'Mouse', 'is_active' => false],
];

$activeProducts = array_filter($products, function (array $product): bool {
    return $product['is_active'] === true;
});

var_dump(array_values($activeProducts));