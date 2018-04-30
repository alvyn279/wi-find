### PHP auto-format and fixer
```
./vendor/bin/phpcbf admin/app --standard=ruleset.xml
```
```
./vendor/bin/phpcbf admin/tests --standard=ruleset.xml
```

### Running PHP unit tests
```
./vendor/bin/phpunit admin/tests
```
```
./vendor/bin/phpunit admin/tests/FileName.php
```
```
./vendor/bin/phpunit --filter methodName admin/tests
```