<?php

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function urlIs($path)
{
    return $_SERVER['REQUEST_URI'] === $path;
}
function authorize($condition, $status = Response::FORBIDDEN)
{

    if ($condition) {
        abort($status);
    }
}

function base_dir($value){
    return BASE_PATH . $value ;
}
function view($value,$param){
    extract($param);
    include base_dir('/views/'.$value) ;
}