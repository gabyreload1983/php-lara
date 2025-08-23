<?php

$routes = require base_path('routes.php');



function routerController($uri, $routes){
    if(array_key_exists($uri,$routes)){
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


routerController($uri, $routes);