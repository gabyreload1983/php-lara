<?php
use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$form = new LoginForm();

if($form->validate($email, $password)){
    $auth = new Authenticator();

    if($auth->attempt($email, $password)) {
        redirect('/');
    } 
    
    $form->error('email', "Invalid credentials.");
}

$_SESSION['_flash']['errors'] = $form->errors();

redirect('/login');

// return view("session/create", [
//     'errors' => $form->errors()
// ]);