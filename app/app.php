<?php

use App\Helpers\Path;
use DevCoder\DotEnv;
use Database\Connection;

require 'functions.php';

if (file_exists(Path::root() . '/.env')) {
    // development
    (new DotEnv(Path::root() . '/.env'))->load();
}


Connection::make();
