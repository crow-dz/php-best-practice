<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = [];

$notes =   $db->query('SELECT * FROM notes where user_id=8', [])->findAll();


view(
    'notes/index.view.php',
    [
        'heading' => 'My Notes',
        'notes' => $notes,

    ]
);
