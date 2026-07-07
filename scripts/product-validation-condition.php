<?php
$name = "Keyboard";
$price = 12000;
$stock = 5;
$isActive = true;


if ($name !== "") {
    echo "Name is not empty" . "\n";
} else {
    echo "Name is empty" . "\n";
}

if ($price > 0) {
    echo "Price is positive" . "\n";
} else {
    echo "Price must be greater than zero" . "\n";
}

if ($stock >= 0) {
    echo "Stock is positive" . "\n";
} else {
    echo "Price must be greater than zero" . "\n";
}
if ($isActive === true && $stock > 0) {
    echo "Product is active and has stock" . "\n";
} else {
    echo "Product is not active or has no stock" . "\n";
}

$name = "";
if ($name != "") {
    echo "Name is not empty" . "\n";
} else {
    echo "Name is empty" . "\n";
}

$price = -1;
if ($price > 0) {
    echo "Price is positive" . "\n";
} else {
    echo "Price must be greater than zero" . "\n";
}

$stock = -1;
if ($stock >= 0) {
    echo "Stock is positive" . "\n";
} else {
    echo "Price must be greater than zero" . "\n";
}

$isActive = false;
if ($isActive === true && $stock > 0) {
    echo "Product is active and has stock" . "\n";
} else {
    echo "Product is not active or has no stock" . "\n";
}

