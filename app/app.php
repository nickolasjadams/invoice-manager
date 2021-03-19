<?php

use DevCoder\DotEnv;
use Database\Connection;

require 'functions.php';

(new DotEnv('../.env'))->load();

Connection::make();
