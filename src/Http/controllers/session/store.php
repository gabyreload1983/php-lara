<?php
use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$form = new LoginForm();

if(! $form->validate($email, $password)){
    return view("session/create", [
        'errors' => $$form->errors()
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
return view("session/create", [
    'errors' => $errors
]);