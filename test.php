<?php

$json = '[{"id":1,"name":"Keyboard","price":12000}]';
$products = json_decode($json, true);

if (!is_array($products)) {
    throw new RuntimeException('Products JSON must be an array');
}

echo($products);