<?php

use Core\Session;
use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm;
$auth = new Authenticator;

if ($form->validate($email, $password)) {
    if ($auth->attempt($email, $password)) {
        redirect('/');
    }
    $form->error('email', 'No matching account found for this email or password');
}

Session::flash('errors', $form->errors());

return redirect('/login');
