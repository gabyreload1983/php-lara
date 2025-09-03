<?php

view("session/create", [
    'errors' => $_SESSION['_flash']['errors'] ?? []
]);