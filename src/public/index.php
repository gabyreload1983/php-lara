<?php


const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    
    $path = base_path($result) . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

require base_path('Core/router.php');