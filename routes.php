<?php

$router->get('/', 'controllers/index.php');

$router->get('/about', 'controllers/about.php');

$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php');

$router->get('/note/create', 'controllers/notes/create.php')->only('auth');

$router->post('/note/create', 'controllers/notes/store.php');

$router->get('/note', 'controllers/notes/show.php');

$router->get('/note/edit', 'controllers/notes/edit.php');

$router->patch('/note', 'controllers/notes/update.php');

$router->delete('/note', 'controllers/notes/destroy.php');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php');

$router->get('/login', 'controllers/sessions/create.php')->only('guest');

$router->post('/session', 'controllers/sessions/store.php')->only('guest');

$router->delete('/session', 'controllers/sessions/destroy.php')->only('auth');





