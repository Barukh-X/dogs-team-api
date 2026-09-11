<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Materia.php';
require_once __DIR__ . '/../includes/auth_check.php';

class MateriaController
{
    private Materia $materiaModel;

    public function __construct()
    {
        // TODO: obter $pdo a partir de config/database.php e passar pro Model
        $this->materiaModel = new Materia($pdo);
    }

    // TODO: listar matérias do usuário logado e retornar JSON
    public function listar(): void
    {
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
