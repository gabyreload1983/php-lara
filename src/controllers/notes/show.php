<?php
$heading = "My Note";

$config = require 'config.php';
$db = new Database($config['database']);

$id = $_GET['id'];

$note = $db->query('SELECT * FROM notes WHERE id = :id',['id' => $id])->findOrFail();

$currentUserId = 1;

authorize($note['user_id'] === $currentUserId);

require_once "views/notes/show.view.php";