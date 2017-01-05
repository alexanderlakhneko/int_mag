<?php

use IntMag\Library\Router;
use IntMag\Library\Request;

ini_set('display_errors',1);
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS . '..' . DS );
define('SRC_DIR', ROOT . 'src' . DS);
define('VIEW_DIR', SRC_DIR . 'View' . DS);
define('LIB_DIR', SRC_DIR . 'Library' . DS);
define('CONFIG_DIR', ROOT . 'config' . DS);
define('VENDOR_DIR', ROOT . 'vendor' . DS);
define('LOG_DIR', ROOT . 'logs' . DS);

require (VENDOR_DIR . 'autoload.php');

$request = new Request();

$router = new Router(CONFIG_DIR . 'routes.php');



$router->match($request);
$route = $router->getCurrentRoute();

$controller = 'IntMag\\Controller\\' . ucfirst($route->controller) . 'Controller';
$action = $route->action . 'Action';

$controller = new $controller();

if (!method_exists($controller, $action)) {
    throw new \Exception('Page not found', 404);
}

$content = $controller->$action($request);

echo $content;