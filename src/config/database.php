<?php

function ConectarDB(): PDO
{
    $host = 'localhost';
    $dbname = 'dogs_team_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    try {
        return new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_FOUND_ROWS => true
        ]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['erro' => 'Erro na conexão com o banco de dados']);
        exit;
    }
}