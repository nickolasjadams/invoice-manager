<?php

namespace App\Controllers;

use App\Helpers\Session;
use App\Helpers\View;


class MyAccountController
{

    public function __construct() {
        Session::check();
    }

    public function index() {

        View::render('my-account', [
            'user' => Session::user()
        ]);
    }
}