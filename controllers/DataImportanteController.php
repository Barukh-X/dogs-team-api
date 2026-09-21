<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/DataImportante.php';
require_once __DIR__ . '/../includes/auth_check.php';

class DataImportanteController
{
    private DataImportante $dataImportanteModel;

    public function __construct()
    {
        // TODO: obter $pdo a partir de config/database.php e passar pro Model
        $this->dataImportanteModel = new DataImportante(ConectarDB());
    }

    // TODO: listar datas importantes do usuário logado e retornar JSON
    public function listar(): void
    {
    }

    // TODO: criar data importante (POST: título, data, materia_id opcional) e retornar JSON
    public function criar(): void
    {
    }

    // TODO: editar data importante (POST) e retornar JSON
    public function editar(): void
    {
    }

    // TODO: excluir data importante (POST) e retornar JSON
    public function excluir(): void
    {
    }
}
