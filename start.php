<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php';

use StackExchange\StackExchangeApi;


$service =  new StackExchangeApi();
var_dump($service->getInfo());