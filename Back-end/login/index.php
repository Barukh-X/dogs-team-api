<?php
require_once __DIR__ . '/../includes/cors.php';
require_once __DIR__ . '/../controllers/AuthController.php';
(new AuthController())->login();
