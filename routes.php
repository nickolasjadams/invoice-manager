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




/**
 * Dashboard routes
 */

$router->get('dashboard', 'app/controllers/dashboard.php');

$router->get('invoices', 'app/controllers/invoice/index.php');

$router->get('invoice', 'app/controllers/invoice/show.php');

$router->get('my-account', 'app/controllers/MyAccountController.php', 'index');

$router->get('logout', 'app/helpers/Session.php', 'logout');