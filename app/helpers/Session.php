<?php

namespace App\Helpers;

class Session
{    
    /**
     * Starts and checks if a user session is active.
     * Redirects to the login page if no session is active.
     * This should be used at the beginning of most controllers.
     */
    public static function check() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: /');
            exit;
        }
    }

    public static function logout() {
        session_start();
        session_destroy();
        header("Location: /");
        exit;
    }
}