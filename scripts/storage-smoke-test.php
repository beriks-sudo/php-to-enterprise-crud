

<?php
$path = __DIR__ . '/../storage/products.json';

if (!file_exists($path)) {
    file_put_contents($path, "[]\n", LOCK_EX);
}

$contents = file_get_contents($path);
if ($contents === false) {
    throw new RuntimeException('Cannot read products storage');
}

echo $contents;

$writtenBytes = file_put_contents($path, "[\n]\n", LOCK_EX);
if ($writtenBytes === false) {
    throw new RuntimeException('Cannot write products storage');
}

