berik@MacBook-Pro-berik php-to-enterprise-crud % php scripts/environment-report.php
PHP version: 8.5.6
PHP_SAPI: cli
memory_limit: 128M
display_errors: 1
json extension: loaded

включает error_reporting(E_ALL) и display_errors для локального учебного запуска;
внутри try выбрасывает RuntimeException;
внутри catch (RuntimeException $exception) выводит безопасное сообщение и пишет техническую деталь через error_log;
не содержит пустого catch.

Cannot finish operation safely
Storage file is missing


Разбор ошибки (неопределённая переменная)
тип: Warning (Undefined variable)
файл: scripts/error-experiment.php 
строка: 7
что исправил: объявил переменную до использования


чем warning отличается от exception; предупреждение и дальше продолжать нельзя
чем Error отличается от Exception на базовом уровне; ерор серьезная ошибка
почему Throwable не надо ловить и молча игнорировать;
почему нельзя молча ловить все исключения.  Пустой catch прячет ошибку: она исчезает, но проблема остаётся, программа продолжает в неверном состоянии, баг становится невидимым. Ловить — только с планом (лог, безопасный
ответ, откат).

Stack trace
Путь, по которому программа пришла к ошибке: файл, строка, цепочка вызовов до места сбоя. Показывает, откуда пришли к проблеме.