<?php

use App\Helpers\View;
session_start();


if (isset($_SESSION['current_user'])) {
    $current_user = $_SESSION['current_user'];
} else {
    $current_user = NULL;
}


View::render('login', [
    'current_user' => $current_user
]);