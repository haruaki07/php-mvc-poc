<?php

require_once "route.php";
require_once "controllers/PostController.php";

// define routes here
$routes = [
  Route::get('/home', [PostController::class, 'index']),
];

// get url path
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$router = new Router($routes);
$router->handle($path);
