<?php
$config = require 'config.php';
$db = new Database($config['database']);

$id = $_GET['id'];

$note = $db->query('SELECT * FROM notes WHERE id = :id',['id' => $id])->fetch();

$heading = "My Note";


require_once "views/note.view.php";