<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Anotacao.php';
require_once __DIR__ . '/../includes/auth_check.php';

class AnotacaoController
{
    private Anotacao $anotacaoModel;

    public function __construct()
    {
        // TODO: obter $pdo a partir de config/database.php e passar pro Model
        $this->anotacaoModel = new Anotacao($pdo);
    }

    // TODO: listar anotações do usuário logado (filtro opcional por matéria/data) e retornar JSON
    public function listar(): void
    {
    }

    // TODO: criar anotação/resumo (POST: materia_id, data, conteúdo) e retornar JSON
    public function criar(): void
    {
    }

    // TODO: editar anotação (POST) e retornar JSON
    public function editar(): void
    {
    }

    // TODO: excluir anotação (POST) e retornar JSON
    public function excluir(): void
    {
    }
}
