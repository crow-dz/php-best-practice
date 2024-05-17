<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET['id'];

$currentUser = 8;

$note = $db->query('SELECT * FROM notes where id= :id ', ['id' => $id])->findOrFail();

authorize($note['user_id'] !== $currentUser);
view(
    'notes/show.view.php',
    [
        'heading' => 'My Note',
        'note' => $note
    ]
);
