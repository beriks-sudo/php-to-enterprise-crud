<?php

echo 'PHP version: ' . PHP_VERSION . PHP_EOL;
echo 'PHP_SAPI: ' . PHP_SAPI . PHP_EOL;
echo 'memory_limit: ' . ini_get('memory_limit') . PHP_EOL;
echo 'display_errors: ' . ini_get('display_errors') . PHP_EOL;
echo 'json extension: ' . (extension_loaded('json') ? 'loaded' : 'missing') . PHP_EOL;
echo 'cwd: ' . getcwd() . PHP_EOL;
