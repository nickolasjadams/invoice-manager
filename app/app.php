<?php

use DevCoder\DotEnv;
use Database\Connection;

(new DotEnv('../.env'))->load();

Connection::make();
