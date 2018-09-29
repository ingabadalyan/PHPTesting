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


### gitlab-ci.yml can be used to configure continuous integration system

### The test coverage and the test report will be generated and stored as artifacts in the pipeline