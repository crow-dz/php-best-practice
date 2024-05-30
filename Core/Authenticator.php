<?php

namespace Core;

use Core\App;
use Core\Database;

class Authenticator
{

    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query('SELECT * from users where email = :email', [
            'email' => $email,
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);
                return true;
            }
        }
        return false;
    }
    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];
    }
    public function logout()
    {
        Session::destroy();

    }
}
