<?php

use Core\Database;

$config = require base_dir('config.php');

$db = new Database($config['database']);

$id = $_GET['id'];

$currentUser = 8;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Auth Layer
    $note = $db->query('SELECT * FROM notes where id= :id ', ['id' => $id])->findOrFail();
    authorize($note['user_id'] !== $currentUser);
    // Delete Action
    $db->query('DELETE from notes where id= :id', ['id' => $_POST['id']]);
    // Redirect
    header('Location:/notes');
    exit();
}

$note = $db->query('SELECT * FROM notes where id= :id ', ['id' => $id])->findOrFail();

authorize($note['user_id'] !== $currentUser);
view(
    'notes/show.view.php',
    [
        'heading' => 'My Note',
        'note' => $note
    ]
);
