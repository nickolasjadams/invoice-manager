<?php

use App\Helpers\Session;
use App\Helpers\View;
session_start();

View::render('login', [
    'errors' => Session::getErrors()
]);