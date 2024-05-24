<?php

namespace Core\Middleware;


class Middleware
{
    const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class
    ];
    public function resolve($key)
    {

        if (!$key) {
            return;
        }
        
        $middleware = static::MAP[$key];

        if (!$middleware) {
            throw new \Exception('No matching middleware key ' . $key);
        }
        (new $middleware)->handle();
    }
}
