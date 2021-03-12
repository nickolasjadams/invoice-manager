<?php

namespace App\Helpers;

class Request
{    
    /**
     * Returns the current requested uri.
     *
     * @return string
     */
    public static function uri() {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }
    
    /**
     * Returns the current requested method type.
     *
     * @return string
     */
    public static function method() {
        return $_SERVER['REQUEST_METHOD'];
    }

}
