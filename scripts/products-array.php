

<?php

$products = [
    ['id' => 1, 'name' => 'apple', 'price' => 330000, 'is_active' => true ],
    ['id' => 2, 'name' => 'samsung', 'price' => 12000, 'is_active' => false ],
    ['id' => 3, 'name' => 'xiaomi', 'price' => 12000, 'is_active' => true ],
];

$sum = 0;
foreach ($products as $product) {
    if ($product['is_active'] === true) {
        echo $product['name'] . "\n";
        $sum += $product['price'];
    }
}

echo $sum . "\n";

$searchId = 2;
$foundProduct = null;

foreach ($products as $product) {
    if($product['id'] === $searchId) {
        $foundProduct = $product;
        break;
    }
}

if ($foundProduct === null) {
    echo "Product not found\n";
} else {
    echo $product['name'] . "\n";
}