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
        $this->mateiraModel->listar_materias();
        
    }

    // TODO: criar matéria (POST) e retornar JSON
    public function criar(): void
    {
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
