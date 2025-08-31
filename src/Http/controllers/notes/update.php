<?php

use Core\App;
use Core\Database;
use Core\Validator;


$db = App::resolve(Database::class);

$currentUserId = 1;
$errors = [];

$id = $_POST['id'];

$note = $db->query('SELECT * FROM notes WHERE id = :id',['id' => $id])->findOrFail();

$currentUserId = 1;

authorize($note['user_id'] === $currentUserId);

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body is required and must be less than 1000 characters.';
}

if (! empty($errors)){
    return view("notes/edit", [
    'heading' => "Edit Note",
    'errors' => $errors,
    'note'=> $note
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    'body' => $_POST['body'],
    'id' => $id
]);

header('location: /notes');
exit();