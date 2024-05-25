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
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Password lenght must be more then seven';
}
if (count($errors)) {
    view(
        'registration/create.view.php',
        [
            'errors' => $errors,
        ]
    );
}
// Check If User Exist
$db = App::resolve(Database::class);

$result = $db->query('SELECT * from users where email = :email', [
    'email' => $email,
])->find();

if ($result) {
    $errors['email'] = 'Email already Exist';
    view(
        'registration/create.view.php',
        [
            'errors' => $errors,
        ]
    );
} else {
    $db->query('INSERT INTO users (email,password) VALUES (:email,:password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ])->find();
    // Redirect
    $_SESSION['user'] = [
        'email'=>$email
    ];
    header('Location:/');
    exit();
}
