<?php

namespace Core\Middleware;


class Guest
{

    public function handle()
    {
        //dd($_SESSION['name'] ?? false);
        if ($_SESSION['user'] ?? false) {
            header('location: /');
            die();
        }
    }
}
