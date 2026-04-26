<?php

define('BASE_DIR', dirname(__DIR__));
require BASE_DIR . '/helpers.php';
require BASE_DIR . '/Router.php';

$router = new Router();
require BASE_DIR . '/routes.php';

// Normalize URI - remove base path /ws02/public
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/ws02/public', '', $uri);
if (empty($uri)) {
    $uri = '/';
}

$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

// require '../views/home.view.php';
// define ('BASE_PATH', dirname(__DIR__));
// require BASE_PATH . '../helpers.php';
// loadView("home");
// require basePath ('views/home.view.php');

?>