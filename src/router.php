<?php


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/notes' => 'controllers/notes.php',
    '/note' => 'controllers/note.php',
    '/contact' => 'controllers/contact.php',
];


function routerController($uri, $routes){
    if(array_key_exists($uri,$routes)){
        require $routes[$uri];
    } else {
        require 'views/404.view.php';
    }
}

routerController($uri, $routes);