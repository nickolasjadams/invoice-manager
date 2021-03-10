<?php

/**
 * Login Page
 */

use App\Middleware\UserAuthentication;

// show login page
$router->get('', 'app/controllers/login.php');
$router->get('login', 'app/controllers/login.php');

// user logging in
$router->post('login', 'app/controllers/user/index.php');

// user signing up
$router->post('signup', 'app/controllers/user/store.php');



$router->get('dashboard', 'app/controllers/dashboard.php');