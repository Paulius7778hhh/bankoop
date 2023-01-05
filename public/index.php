<?php
use Begin\App;

require __DIR__ . '/../vendor/autoload.php';

define('URL', "http://lbank.lt");

$response = App::nice();

echo $response;