<?php

use App\Helpers\View;

session_start();

require '../vendor/autoload.php';
require '../app/app.php';
    
// Login Page
View::render('login', [
    'greeting' => 'Hello World',
    'rand' => random_int(0, 100),
    'variableVariablesForTheWin' => true
]);

?>
