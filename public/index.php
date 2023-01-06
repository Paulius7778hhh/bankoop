<?php
use Start\App;

require __DIR__ . '/../vendor/autoload.php';

define('URL', "http://lbank.lt");

$response = App::start();

echo $response;
