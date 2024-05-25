<?php

use Core\App;

use Core\Database;

use Core\Validator;




require base_dir('Core/Validator.php');



$db = App::resolve(Database::class);

$errors = [];


$value = $_POST['body'];


// find the corresponding note
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

if (!Validator::string($value, 1, 1000)) {
    $errors['body'] = 'A body Must be More then 1 and Less then 1000!';
}

if (count($errors)) {
    view(
        'notes/edit.view.php',
        [
            'heading' => 'Update Note',
            'errors' => $errors,
            'note' => $note
        ]
    );
}

if (empty($errors['body'])) {
    $notes =   $db->query('UPDATE notes SET body = :body  WHERE id = :id AND  user_id = :user_id ', [
        'body' => $_POST['body'],
        'id' => $_POST['id'],
        'user_id' => 8

    ]);
}

// Redirect
header('Location:/notes');
exit();
