<?php

use App\Helpers\Path;
use App\Helpers\Request;
use App\Helpers\Router;

require '../vendor/autoload.php';
require '../app/app.php';

require Router::load(Path::root() . '/routes.php')
    ->direct(Request::uri(), Request::method());



?>
