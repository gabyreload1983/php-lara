<?php
$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Create Note";


$currentUserId = 1;

if($_SERVER["REQUEST_METHOD"] === "POST") {
  $db->query('INSERT INTO notes (user_id, body) VALUES (:user_id, :body)', [
    'user_id' => $currentUserId,
    'body' => $_POST['body']
  ]);
}

require_once "views/note-create.view.php";