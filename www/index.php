<?php

use App\Helpers\Path;
use App\Helpers\Request;
use App\Helpers\Router;

require '../vendor/autoload.php';
require '../app/app.php';

$router = Router::load(Path::root() . '/routes.php');
if (class_exists($router->getController(Request::uri(), Request::method()))) {
    Router::load(Path::root() . '/routes.php')
        ->direct(Request::uri(), Request::method());
} else {
    // non class files must be loaded with require.
    require Router::load(Path::root() . '/routes.php')
        ->direct(Request::uri(), Request::method());
}




?>
