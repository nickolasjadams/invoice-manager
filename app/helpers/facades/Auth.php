<?php

namespace App\Helpers\Facades;

use Exception;

class Auth
{    
    /**
     * Returns the current user if a session is active.
     *
     * @throws Exception Surround with try catch
     * @return App\Models\User
     */
    public static function currentUser() {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        } else {
            throw new Exception("No current user.");
        }
    }
}