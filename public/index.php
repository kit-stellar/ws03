<?php
    define('BASE_PATH', dirname(__DIR__));

    require BASE_PATH . '/vendor/autoload.php';
    require BASE_PATH . '/helpers.php';

    use Framework\Router;
    use Framework\Session;

    Session::start();

    $router = new Router();
    $routes = require basePath('routes.php');

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $method = $_SERVER['REQUEST_METHOD'];

    $router->route($uri, $method);
?>