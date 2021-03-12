<?php

namespace App\Helpers;

use App\Helpers\Facades\Log;
use Exception;

class Router
{

    protected $routes = [
        'GET' => [],
        'POST' => []
    ];
    
    /**
     * Loads a routes file and returns an instance
     * of a router to directed.
     *
     * @param  mixed $file
     * @return Router
     */
    public static function load($file) {
        $router = new static;
        require $file;
        return $router;
    }
    
    /**
     * Directs the user to the controller path associated with uri 
     * after a routes file has been loaded.
     *
     * @param  mixed $uri
     * @param  mixed $requestType
     * @return mixed Path to controller or controller/method associated with uri
     */
    public function direct($uri, $requestType) {

        

        

        

        if (array_key_exists($uri, $this->routes[$requestType])) {
            // check if specific method was stored.
            if (count(explode('@', $this->routes[$requestType][$uri])) == 2) {
                return $this->callMethod(...explode('@', $this->routes[$requestType][$uri]));
            } else {
                return $this->routes[$requestType][$uri];
            }
        } else {
            // TODO offical 404 page.
            die("TODO: official 404");
        }
    }

    protected function callMethod($controller, $method) {

        try {

            $controller = Path::toNameSpace($controller);

            if (!method_exists($controller, $method)) {
                throw new Exception("{$controller} method {$method} not found");
            }

            return (new $controller)->$method();

        } catch (Exception $e) {
            Log::error("Router error: " . $e->getMessage());
        }

        
        
    }

    public function getController($uri, $requestType) {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            // remove method
            $controller = explode('@', $this->routes[$requestType][$uri])[0];
            $controller = Path::toNameSpace($controller);
            return $controller;
        }
    }
    
    /**
     * Adds an key/value entry to the GET routes array.
     *
     * @param  mixed $uri
     * @param  mixed $controller
     */
    public function get($uri, $controller, $method = null) {
        $controller = Path::root(5) . '/' . $controller;
        if ($method != null) {
            $controller .= '@' . $method;
        }
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Adds an key/value entry to the POST routes array.
     *
     * @param  mixed $uri
     * @param  mixed $controller
     */
    public function post($uri, $controller) {
        $controller = Path::root(5) . '/' . $controller;
        $this->routes['POST'][$uri] = $controller;
    }
}