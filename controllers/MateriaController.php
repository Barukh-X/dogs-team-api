<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Materia.php';
require_once __DIR__ . '/../includes/auth_check.php';

class MateriaController
{
    private Materia $materiaModel;

    public function __construct()
    {
        $this->materiaModel = new Materia(ConectarDB());
    }

    public function listar(): void
    {
        
        if($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            echo json_encode(['erro' => 'Utilize método GET']);
            exit;
        }
        
        $materias = $this->materiaModel->listar_materias();
        
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode(['materias' => $materias]);
        
    }

    // TODO: criar matéria (POST) e retornar JSON
    public function criar(): void
    {
        if($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code();
            echo json_encode(['erro' => 'Utilize método POST']);
            exit;
        }
        
        
    }

    // TODO: editar matéria (POST) e retornar JSON
    public function editar(): void
    {
    }

    // TODO: excluir matéria (POST) e retornar JSON
    public function excluir(): void
    {
    }
}
