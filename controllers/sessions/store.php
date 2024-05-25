<?php

use Core\Validator;
use Core\App;
use Core\Database;


$email = $_POST['email'];
$password = $_POST['password'];

// Validate User Input
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Enter Valid Email';
}
if (!Validator::string($password)) {
    $errors['password'] = 'Password lenght must be more then seven';
}
if (count($errors)) {
    view(
        'sessions/create.view.php',
        [
            'errors' => $errors,
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
