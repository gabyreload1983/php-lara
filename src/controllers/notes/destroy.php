<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$id = $_POST['id'];

$note = $db->query('SELECT * FROM notes WHERE id = :id',['id' => $id])->findOrFail();

$currentUserId = 1;
authorize($note['user_id'] === $currentUserId);

$db->query('DELETE FROM notes WHERE id = :id', ['id' => $id]);

header('location: /notes');
exit();