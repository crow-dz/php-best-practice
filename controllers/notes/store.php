<?php

use Core\Database;

use Core\Validator;

require base_dir('Core/Validator.php');

$config = require base_dir('config.php');


$db = new Database($config['database']);

$errors = [];


$value = $_POST['body'];

if (!Validator::string($value, 1, 1000)) {
    $errors['body'] = 'A body Must be More then 1 and Less then 1000!';
}



if (empty($errors['body'])) {
    $notes =   $db->query('INSERT INTO notes (body,user_id) VALUES (:body,:user_id)', [
        'body' => $_POST['body'],
        'user_id' => 8

    ])->findAll();
}

// Redirect
header('Location:/notes');
exit();

