<?php


use Core\Response;

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function abort($code = 404)
{
    http_response_code($code);
    view("{$code}.view.php");
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

function base_dir($value)
{
    return BASE_PATH . $value;
}
function view($value, $param = [])
{
    extract($param);
    require base_dir('views/' . $value);
}
