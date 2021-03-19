<?php

namespace App\Helpers\Facades;

use Exception;

class Auth
{    
    /**
     * Returns the current user if a session is active.
     *
     * @return App\Models\User
     */
    public static function currentUser() {
        try {
            if (isset($_SESSION['user'])) {
                return $_SESSION['user'];
            } else {
                throw new Exception("No current user.");
            }
        } catch (Exception $e) {
            Log::debug("currentUser called on inactive session");
        }       
    }
}