<?php


$config = require base_dir('config.php');

$db = new Database($config['database']);

$notes = [];

$notes =   $db->query('SELECT * FROM notes where user_id=8', [])->findAll();


view(
    'notes/index.view.php',
    [
        'heading' => 'My Notes',
        'notes' => $notes,

    ]
);
