<?php

session_start();

require '../vendor/autoload.php';
require '../app/app.php';


    


    

    echo "Login";

    if (isset($_SESSION['user'])) {
        echo $_SESSION['user'];
        header("Location: dashboard.html");
    }
    
    
    // include_once("index.html"); ?>
