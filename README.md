# StackExchangeApi

### Install composer dependencies
```bash
docker run --rm --interactive --tty \
    --volume $PWD:/app \
    --user $(id -u):$(id -g) \
    composer install

```

### Run all test
```bash
docker run -it --rm  --user $(id -u):$(id -g) --name StackExchangeApi -v "$PWD":/usr/src -w /usr/src zaherg/php-7.2-xdebug-alpine php vendor/bin/phpunit
```
