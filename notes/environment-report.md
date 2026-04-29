# Environment report

Commands:

```bash
php scripts/environment-report.php
php scripts/error-experiment.php
php -l scripts/environment-report.php
php -l scripts/error-experiment.php
```

Observed output:

```text
PHP version: 8.5.1
PHP_SAPI: cli
memory_limit: 128M
display_errors:
json extension: loaded
cwd: /Users/sultan/PhpstormProjects/courses/php-to-enterprise-crud/ref-worktrees/modules-01-03
A recoverable training error happened. See the PHP error log for technical details.
```

## Undefined variable experiment

I temporarily added:

```php
echo $missingProductName;
```

Message:

```text
Warning: Undefined variable $missingProductName in scripts/environment-report.php on line 9
```

Type: warning. File: `scripts/environment-report.php`. Line: `9`. Fix: define the variable before reading it or remove the accidental read.

A warning is emitted by the engine and the script may continue. An exception is an object thrown intentionally or by a library and should be caught only where the program can handle it. `Error` represents engine-level serious problems such as calling an undefined function or a type error. `Exception` is for exceptional application/library flow. Both implement `Throwable`.

A stack trace shows the call path to the place where the problem happened. Catching `Throwable` and ignoring it hides both real errors and expected exceptions, so it makes debugging and production operations worse. A catch block should either handle, log, transform or rethrow the problem.

For local learning, displaying errors is useful. In production, technical details should go to logs and users should receive safe messages.
