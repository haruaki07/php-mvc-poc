<?php

require_once "route.php";

// define routes here
$routes = [
  
];

// get url path
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$router = new Router($routes);
$router->handle($path);
