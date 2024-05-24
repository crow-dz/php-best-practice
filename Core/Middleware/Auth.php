<?php

namespace Core\Middleware;


class Auth
{

    public function handle()
    {
        //dd(! $_SESSION['name']??false);
        if (!$_SESSION['name'] ?? false) {
            header('location: /');
            die();
        }
    }
}
