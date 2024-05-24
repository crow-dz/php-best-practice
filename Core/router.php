<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{

    protected $routes = [];

    public function add($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middelware' => null
        ];
        return $this;
    }

    public function get($uri, $controller)
    {
        return  $this->add($uri, $controller, 'GET');
    }
    public function post($uri, $controller)
    {
        return  $this->add($uri, $controller, 'POST');
    }
    public function put($uri, $controller)
    {
        return  $this->add($uri, $controller, 'PUT');
    }
    public function patch($uri, $controller)
    {
        return  $this->add($uri, $controller, 'PATCH');
    }
    public function delete($uri, $controller)
    {
        return  $this->add($uri, $controller, 'DELETE');
    }
    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middelware'] = $key;
    }
    function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {
                // Apply Midware

                (new Middleware)->resolve($route['middelware']);

                require base_dir($route['controller']);
                die();
            }
        }
        $this->abort();
    }
    protected function abort($code = 404)
    {
        http_response_code($code);
        view("{$code}.view.php");
        die();
    }
}
