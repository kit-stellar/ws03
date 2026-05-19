<?php

session_start();

use Framework\Database;
use Framework\Router;

require __DIR__ . '/../vendor/autoload.php';
require '../helpers.php';

$config = require basePath("config/db.php");

$db = new Database($config);
$router = new Router();
$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$router->route($uri);


?>