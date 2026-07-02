<?php

$product = require __DIR__ . '/product.php';
var_dump($product);
$product = json_decode($product, true);
var_dump($product);
$name = $product['name'];
$price = $product['price'];
$currency = $product['currency'];
?>

<div>
    <h1><?= $name ?></h1>
    <p><?= $price ?> <?= $currency ?></p>
</div>
