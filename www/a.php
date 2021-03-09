<?php

use App\Helpers\View;

session_start();

require '../vendor/autoload.php';
require '../app/app.php';

    $greeting = random_int(0,10);
    
// Login Page
View::render('dashboard', [
    'greeting' => 'Hello World',
    'rand' => random_int(0, 100),
    'variableVariablesForTheWin' => true
]);

?>
