<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm;

if (! $form->validate($email, $password)) {
    view(
        'sessions/create.view.php',
        [
            'errors' => $form->errors(),
        ]
    );
}
// check if user exist
$db = App::resolve(Database::class);

$user = $db->query('SELECT * from users where email = :email', [
    'email' => $email,
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);
        header('location: /');
        die();
    }
}


$errors['global'] = 'No matching account found for this email or password';
view(
    'sessions/create.view.php',
    [
        'errors' => $errors,
    ]
);
