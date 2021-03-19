<?php

namespace App\Helpers;

use App\Helpers\Facades\Auth;
use App\Helpers\Facades\Log;
use Exception;

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
     * Provides the session's user object.
     * Alias to Auth::currentUser
     * @return User
     */
    public static function user() {
        return Auth::currentUser();
    }

    public static function updateUser($user)  {
        $_SESSION['user'] = $user;
    }
    
    /**
     * Destroy the session and go back to the login page.
     */
    public static function logout() {
        session_start();
        session_destroy();
        header("Location: /");
        exit;
    }
    
        
    /**
     * Clear the session errors array.
     */
    public static function clearErrors() {
        $_SESSION['errors'] = [];
    }
    
    /**
     * Push an error to the session 'errors' associative array.
     *
     * @param  string $key
     * @param  string $value
     */
    public static function pushError($key, $value) {
        $_SESSION['errors'][$key] = $value;
    }
    
    /**
     * Return the sessions 'errors' associative array.
     *
     * @return array
     */
    public static function getErrors() {
        if (isset($_SESSION['errors'])) {
            return $_SESSION['errors'];
        }
    }

    /**
     * Clear the session successes array.
     */
    public static function clearSuccesses() {
        $_SESSION['successes'] = [];
    }
        
    /**
     * Push a success to the session 'successes' associative array.
     *
     * @param  string $key
     * @param  string $value
     */
    public static function pushSuccess($key, $value) {
        $_SESSION['successes'][$key] = $value;
    }
    
    /**
     * Return the sessions 'successes' associative array.
     * 
     * @return array
     */
    public static function getSuccesses() {
        if (isset($_SESSION['successes'])) {
            return $_SESSION['successes'];
        }
    }

    public static function snapshotFormData() {
        if (isset($_POST)) {
            $_SESSION['form-data'] = $_POST;
        } else if (isset($_GET)) {
            $_SESSION['form-data'] = $_GET;
        } else {
            Log::debug("Cannot snapshot data without POST or GET data.");
        }
    }

    public static function getFormData() {
        if (isset($_SESSION['form-data'])) {
            return $_SESSION['form-data'];
        }
    }

    public static function clearFormData() {
        $_SESSION['form-data'] = [];
    }

    
}