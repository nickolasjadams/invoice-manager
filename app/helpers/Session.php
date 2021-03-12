<?php

namespace App\Helpers;

use App\Helpers\Facades\Auth;

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

    /**
     * Provides the session's user object
     * Alias to Auth::currentUser
     */
    public static function user() {
        return Auth::currentUser();
    }

    public static function logout() {
        session_start();
        session_destroy();
        header("Location: /");
        exit;
    }
}