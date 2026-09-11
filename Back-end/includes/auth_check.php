<?php
session_start();

// Ajuste a chave da sessão conforme o que AuthController::login() gravar
if (!isset($_SESSION['usuario_id'])) {
    header('Location: /Front-end/index.html');
    exit;
}
