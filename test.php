<?php

$rawEmail = 'manager@example';
$rawUrl = 'https://example.com/products/1';
$rawPrice = '1';

$email = filter_var($rawEmail, FILTER_VALIDATE_EMAIL);
$url = filter_var($rawUrl, FILTER_VALIDATE_URL);
$price = filter_var($rawPrice, FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1],
]);

if ($email === false) {
    echo "Invalid email\n";
}

if ($url === false) {
    echo "Invalid URL\n";
}

if ($price === false) {
    echo "Invalid price\n";
}