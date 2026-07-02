berik@MacBook-Pro-berik php-to-enterprise-crud % php scripts/environment-report.php
PHP version: 8.5.6
PHP_SAPI: cli
memory_limit: 128M
display_errors: 1
json extension: loaded
cwd: /Users/berik/Developer/education/php/php-to-enterprise-crud

berik@MacBook-Pro-berik php-to-enterprise-crud % php scripts/error-experiment.php  
включает error_reporting(E_ALL) и display_errors для локального учебного запуска;
внутри try выбрасывает RuntimeException;
внутри catch (RuntimeException $exception) выводит безопасное сообщение и пишет техническую деталь через error_log;
не содержит пустого catch.

Cannot finish operation safely
Storage file is missing

Затем специально допусти одну ошибку с неопределенной переменной, прочитай сообщение и добавь в заметку:

тип ошибки; warning undefined variable;
файл;error-experiment.php
строку; 7
что исправил; убрал переменную $undefined;
чем warning отличается от exception; предупреждение и дальше продолжать нельзя
чем Error отличается от Exception на базовом уровне; ерор серьезная ошибка
почему Throwable не надо ловить и молча игнорировать;
почему нельзя молча ловить все исключения. их надо обрабатывать что код не упал и было понятно где сработала ошибка