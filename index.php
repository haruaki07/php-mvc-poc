<?php

session_start();

require_once "route.php";
require_once "controllers/PostController.php";
require_once "controllers/AuthController.php";

// define routes here
$routes = [ 
  Route::get('/', [PostController::class, 'index']),
  Route::get('/([0-9]*)', [PostController::class, 'show']),
  Route::get('/create', [PostController::class, 'create']),
  Route::post('/create', [PostController::class, 'store']),
  Route::get('/delete/([0-9]*)', [PostController::class, 'delete']),
  Route::get('/edit/([0-9]*)', [PostController::class, 'edit']),
  Route::post('/edit/([0-9]*)', [PostController::class, 'update']),

  Route::get('/login', [AuthController::class, 'index']),
  Route::post('/login', [AuthController::class, 'login']),
];

// get url path
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$router = new Router($routes);
$router->handle($path);
