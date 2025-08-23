<?php
$heading = "My Note";

$config = require 'config.php';
$db = new Database($config['database']);

$id = $_GET['id'];

$note = $db->query('SELECT * FROM notes WHERE id = :id',['id' => $id])->fetch();

if(!$note){
     abort();
}

$currentUserId = 1;

if($note['user_id'] !== $currentUserId){
     abort(Response::FORBIDDEN);
}

require_once "views/note.view.php";