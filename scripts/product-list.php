<?php

$products = ['Apple', 'Banana', 'Orange'];
echo $products[0];
$products[] = "Pineapple";
$products[1] = "Chocolate";
unset($products[2]);
$products = array_values($products);

foreach ($products as $product) {
    echo $product . "\n";
}

echo count($products) . "\n";