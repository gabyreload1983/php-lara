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

if(! Validator::string($password)) {
    $errors['password'] = "A password is required.";
}   

if(! empty($errors)) {
    return view("sessions/create", [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);


$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();


if($user) {
    if(password_verify($password, $user['password'])){
        
        login([
            'email'=> $email
        ]);
        
        header('location: /');
        exit();
    }
}

$errors['email'] = "Invalid credentials.";
return view("sessions/create", [
    'errors' => $errors
]);