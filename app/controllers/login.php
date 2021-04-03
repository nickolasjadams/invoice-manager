<?php

use App\Helpers\Session;
use App\Helpers\View;
session_start();

View::render('login', [
    'form_data' => Session::getFormData(),
    'errors' => Session::getErrors()
]);