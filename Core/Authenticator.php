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
        //Empty Session
        $_SESSION = [];
        // Destroy server session
        session_destroy();
        // Getting cookie params to set session as expairt
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
