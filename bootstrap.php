<?php
require_once __DIR__ . DIRECTORY_SEPARATOR  . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

define('ROOT_DIR', realpath(__DIR__));

$dotenv = new Dotenv\Dotenv(ROOT_DIR);
$dotenv->load();