<?php

use Core\Database;
use Core\Validator;


$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 1;
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body is required and must be less than 1000 characters.';
    }
  
    if (empty($errors)){
        $db->query('INSERT INTO notes (user_id, body) VALUES (:user_id, :body)', [
            'user_id' => $currentUserId,
            'body' => $_POST['body']
        ]);
    }
}

view("notes/create", [
    'heading' => "Create Note",
    'errors' => $errors ?? []
]);