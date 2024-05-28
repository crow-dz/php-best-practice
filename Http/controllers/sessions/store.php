<?php

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
    $form->error('global', 'No matching account found for this email or password');
}
view(
    'sessions/create.view.php',
    [
        'errors' => $form->errors(),
    ]
);
