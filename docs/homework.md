# Verification

```bash
php -l scripts/environment-report.php
php -l scripts/error-experiment.php
php scripts/environment-report.php
php scripts/error-experiment.php
find scripts src examples -name '*.php' -print -exec php -l {} \;
git diff --check
```
