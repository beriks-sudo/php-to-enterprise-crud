<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

try {
    throw new RuntimeException('Database connection is not configured for this lesson.');
} catch (RuntimeException $exception) {
    echo 'A recoverable training error happened. See the PHP error log for technical details.' . PHP_EOL;
    error_log('Training RuntimeException: ' . $exception->getMessage());
}
