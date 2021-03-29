<?php

use DevCoder\DotEnv;
use Database\Connection;

require 'functions.php';

if (file_exists('../.env')) {
    // development
    (new DotEnv('../.env'))->load();
}

Connection::make();
