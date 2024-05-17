<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET['id'];

$currentUser = 8;

// Auth Layer
$note = $db->query('SELECT * FROM notes where id= :id ', ['id' => $id])->findOrFail();
authorize($note['user_id'] !== $currentUser);
// Delete Action
$db->query('DELETE from notes where id= :id', ['id' => $_POST['id']]);
// Redirect
header('Location:/notes');
exit();
