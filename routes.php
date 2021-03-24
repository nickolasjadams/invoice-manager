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
$router->post('my-account-password', 'app/controllers/MyAccountController.php', 'updatePassword');
$router->post('my-account-info', 'app/controllers/MyAccountController.php', 'updateInfo');

$router->get('logout', 'app/helpers/Session.php', 'logout');

/**
 * Admin routes
 */
$router->get('partners', 'app/controllers/PartnersController.php', 'index');

/**
 * API
 */
$router->get('api/partners', 'app/controllers/APIController.php', 'partners');
$router->post('api/partners/verify', 'app/controllers/APIController.php', 'verify'); // admin
$router->post('api/partners/toggle-active', 'app/controllers/APIController.php', 'toggleActive'); // admin
$router->get('api/public/partners', 'app/controllers/APIController.php', 'publicPartners');