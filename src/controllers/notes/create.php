<?php

require 'Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Create Note";


$currentUserId = 1;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

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

require_once "views/notes/create.view.php";