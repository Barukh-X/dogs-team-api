<?php

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    http_response_code(401);
    
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['sucesso' => false, 'mensagem' => "Sessão expirou ou usuário não autenticado"]);
    exit;
}
