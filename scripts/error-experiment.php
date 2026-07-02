включает error_reporting(E_ALL) и display_errors для локального учебного запуска;
внутри try выбрасывает RuntimeException;
внутри catch (RuntimeException $exception) выводит безопасное сообщение и пишет техническую деталь через error_log;
не содержит пустого catch.

<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');



try {
    throw new RuntimeException('Storage file is missing');
} catch (RuntimeException $exception) {
    echo "Cannot finish operation safely\n";
    error_log($exception->getMessage());
}