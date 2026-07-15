

<?php
$products = [
        ["id" => 1, "name" => "Keyboard"],
        ["id" => 2, "name" => "Mouse"],
];

$path = __DIR__ . '/../storage/products.json';
$json = json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
$writtenBytes = file_put_contents($path, $json . "\n", LOCK_EX);

if ($writtenBytes === false) {
    throw new RuntimeException(
        'Cannot write products storage'
    );
}

$json = file_get_contents($path);

if ($json === false) {
    throw new RuntimeException(
        'Cannot read products storage'
    );
}

try {
    $reader = json_decode(
        $json,
        true,
        512,
        JSON_THROW_ON_ERROR
    );
} catch (JsonException $exception) {
    throw new RuntimeException(
        'Invalid products JSON: '
        . $exception->getMessage()
    );
}

if (!is_array($reader)) {
    throw new RuntimeException(
        'Products storage must contain JSON array'
    );
}

foreach ($reader as $product) {
    echo $product['name'] . "\n";
}
