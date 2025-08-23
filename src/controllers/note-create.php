<?php
$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Create Note";


$currentUserId = 1;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];
    
    if (strlen(trim($_POST['body'])) === 0) {
        $errors['body'] = 'Body is required';
    }
  
    if (strlen(trim($_POST['body'])) > 1000) {
        $errors['body'] = 'The body can not be longer than 1000 characters';
    }

    if (empty($errors)){
        $db->query('INSERT INTO notes (user_id, body) VALUES (:user_id, :body)', [
            'user_id' => $currentUserId,
            'body' => $_POST['body']
        ]);
    }
}

require_once "views/note-create.view.php";