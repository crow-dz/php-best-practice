<?php 



$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes  = require base_dir('routes.php');


function routesToControllers($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        
        require base_dir($routes[$uri]);
    } else {
        abort();
    }
}
function abort($code = 404)
{
    http_response_code($code);
     view("{$code}.view.php");
    die();
}

routesToControllers($uri, $routes);