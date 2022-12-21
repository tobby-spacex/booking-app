<?php

declare(strict_types = 1);

use App\Router;
use App\Controllers\BaseController;
use App\Controllers\RoomsController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('VIEW_PATH', __DIR__ . '/../resources/views');

$router = new Router();

$router
    ->get('/', [BaseController::class, 'index'])
    ->get('/rooms/room1', [RoomsController::class, 'room'])
    ;

echo $router->resolve(
    $_SERVER['REQUEST_URI'],
    strtolower($_SERVER['REQUEST_METHOD'])
);
