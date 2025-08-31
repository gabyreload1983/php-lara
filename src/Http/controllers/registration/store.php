<?php
use Core\App;
use Core\Database;
use Core\Validator;


$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$errors = [];

if(! Validator::email($email)) {
    $errors['email'] = "A valid email is required.";
}   

if(! Validator::string($password, 8, 20)) {
    $errors['password'] = "A password is required and must be between 8 and 20 characters.";
}   

if(! empty($errors)) {
    return view("registration/create", [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);


$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();


if($user) {
    $errors['email'] = "Email is already registered.";
    return view("registration/create", [
        'errors' => $errors
    ]);
}

if(!$user){
    $db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login([
        'email'=> $email
    ]);
    
    header('location: /');
    exit();
}