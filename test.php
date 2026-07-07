<?php

$ids = [10, 20, 30, 40];
$targetId = 40;

foreach ($ids as $id) {
    if ($id !== $targetId) {
        echo "Not found: " . $id . "\n";
        continue;
    }

    echo "Found: " . $id . "\n";
    break;
}