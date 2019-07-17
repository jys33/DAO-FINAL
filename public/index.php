<?php
session_start();
mb_internal_encoding('UTF-8');
setlocale(LC_TIME, 'es_RA.UTF-8');
date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once '../src/App/Config.php';
\App\Config::setDirectory('../config');

$config = \App\Config::get('autoload');
require_once $config['class_path'] . '/App/Autoloader.php';

if (!isset($_SERVER['PATH_INFO']) || empty($_SERVER['PATH_INFO']) || $_SERVER['PATH_INFO'] == '/') {
	// ruta predefinida
    $route = 'login';
} else {
    $route = $_SERVER['PATH_INFO'];
}

$router = new \App\Router();
$router->start($route);