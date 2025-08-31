<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET['id'];

$note = $db->query('SELECT * FROM notes WHERE id = :id',['id' => $id])->findOrFail();

$currentUserId = 1;

authorize($note['user_id'] === $currentUserId);

view("notes/show", [
    'heading' => "My Note",
    'note' => $note
]);;