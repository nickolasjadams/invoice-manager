<?php

namespace App\Helpers;

class Router
{

    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file) {
        $router = new static;
        require $file;
        return $router;
    }

    public function direct($uri, $requestType) {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->routes[$requestType][$uri];
        } else {
            die("TODO: official 404");
        }
    }

    public function get($uri, $controller) {
        $controller = Path::root(5) . '/' . $controller;
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller) {
        $controller = Path::root(5) . '/' . $controller;
        $this->routes['POST'][$uri] = $controller;
    }
}