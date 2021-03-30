<?php

use App\Helpers\Path;
use App\Helpers\Request;
use App\Helpers\Router;

require '../vendor/autoload.php';
require '../app/app.php';

d('index.php');
$router = Router::load(Path::root() . '/routes.php');
if (class_exists($router->getController(Request::uri(), Request::method()))) {
    d(Request::uri() . ' Controller called. Continuing');
    Router::load(Path::root() . '/routes.php')
        ->direct(Request::uri(), Request::method());
} else {
    // non class files must be loaded with require.
    d('handler file called ' . Request::uri() . '.php');
    require Router::load(Path::root() . '/routes.php')
        ->direct(Request::uri(), Request::method());
}




?>
