<!--Реализуй функции:-->
<!---->
<!--Проверь функции на массиве из трех товаров. В конце выведи:-->
<!---->
<!--найденный товар;-->
<!--список активных товаров;-->
<!--общую сумму цен активных товаров.-->

<?php
$products = [
        ['id' => 1, 'name' => 'apple', 'price' => 330000, 'is_active' => true ],
        ['id' => 2, 'name' => 'samsung', 'price' => 12000, 'is_active' => false ],
        ['id' => 3, 'name' => 'xiaomi', 'price' => 12000, 'is_active' => true ],
];

function normalizeProductName(string $name): string {
    return trim($name);
}

function isValidProductPrice(int $price): bool {
    return $price > 0;
}

function findProductById(array $products, int $id): ?array {
    foreach ($products as $product) {
        if ($product['id'] === $id) {
            return $product;
        }
    }
    return null;
}

function getActiveProducts(array $products): array {
    return array_filter($products, function(array $product) : bool {
        return $product['is_active'] === true;
    });
}

function calculateTotalPrice(array $products): int {
    $total = 0;
    foreach ($products as $product) {
        $total += $product['price'];
    }
    return $total;
}

var_dump(findProductById($products, 3));
var_dump(getActiveProducts($products));
echo calculateTotalPrice($products);