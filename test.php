<?php

$path = __DIR__ . '/../php-to-enterprise-crud/test.php';

if (!file_exists($path)) {
    echo "Storage file does not exist yet\n";
}

echo $path;