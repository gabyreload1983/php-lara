<?php


const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'functions.php';

spl_autoload_register(function ($class) {
    $path = base_path("Core/" . $class) . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

require base_path('router.php');