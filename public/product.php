<?php

$productName = "Keyboard";
$price = 12000;
$currency = "KZT";

header('Content-Type: application/json');

echo json_encode([
    'name' => $productName,
    'price' => $price,
    'currency' => $currency,
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);





