<?php

function ConectarDB() : PDO
{

$host = 'localhost';
$dbname = 'dogs_team_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

  try {
    return new PDO($dsn, $user, $pass);
  } catch (Exception $e) {
    echo "Erro na conexão: " . $e->getMessage();
  }
}