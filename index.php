<?php

require_once "controllers/PostController.php";
require_once "route.php";

// define routes here
$routes = [
  Route::get("/", [PostController::class, "index"]),
  Route::get("/create", [PostController::class, "create"]),
  Route::post("/", [PostController::class, "store"]),
  Route::get("/([0-9]*)", [PostController::class, "show"]),
  Route::post("/([0-9]*)/delete", [PostController::class, "delete"]),
];

// get url path
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$router = new Router($routes);
$router->handle($path);
