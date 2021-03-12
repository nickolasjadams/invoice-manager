<?php

namespace App\Controllers;

use App\Helpers\View;

class MyAccountController
{
    public function index() {
        echo 'MyAccountController has been called';

        View::render('my-account');
    }
}