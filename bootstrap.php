<?php

require __DIR__ . '/vendor/autoload.php';

use Main\Core\Router;
use Main\Core\Container;

session_start();

/**
 * Exception reporting for front controller.
 */
error_reporting(E_ALL);
set_error_handler('Main\Core\Error::errorHandler');
set_exception_handler('Main\Core\Error::exceptionHandler');

/**
 * .env file setup.
 */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

/**
 * Dependency injection container initialization.
 */
$container = new Container();
$serviceDefinitions = require __DIR__ . $_ENV['DI_CONFIG'];
foreach ($serviceDefinitions as $interface => $implementation) {
    $container->set($interface, $implementation);
}

/**
 * Routing presets.
 */
$router = new Router($container);
$routes = require __DIR__ . $_ENV['ROUTES_CONFIG'];
foreach ($routes as $route) {
    $router->add($route['path'], ['controller' => $route['controller']], $route['methods']);
}
$result = $router->dispatch($_SERVER['REQUEST_URI']);

/**
 * Message display.
 */
if (is_array($result)) {
    echo json_encode($result);
}
