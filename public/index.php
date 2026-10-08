<?php

require_once __DIR__ . '/../src/includes/cors.php';
require_once __DIR__ . '/../src/config/database.php';
require_once __DIR__ . '/../src/routes/api.php';

$router->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI']
);