<?php

namespace Core;

use Exception;

class Container
{
    protected $bindings = [];
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }
    public function resolve($key)
    {

        if (! key_exists($key, $this->bindings)) {
           throw new Exception("No Matching Binding Find {$key}");
        }
        if (key_exists($key, $this->bindings)) {
            $resolver =$this->bindings[$key];
            return call_user_func($resolver);
        }
    }
}
