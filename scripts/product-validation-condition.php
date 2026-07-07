<?php
$name = "Keyboard";
$price = 12000;
$stock = 5;
$isActive = true;


if ($name != "") {
    echo "Name is not empty" . "\n";
}

if ($price > 0) {
    echo "Price is positive" . "\n";
}

if ($stock > 0) {
    echo "Stock is positive" . "\n";
}
if ($isActive === true && $stock > 0) {
    echo "Product is active and has stock" . "\n";
}

$name = "";
if ($name != "") {
    echo "Name is not empty" . "\n";
} else {
    echo "Name is empty" . "\n";
}

