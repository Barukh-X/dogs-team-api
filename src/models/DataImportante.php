<?php

class DataImportante
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // TODO: listar datas importantes de um usuário
    public function listarPorUsuario(int $usuarioId): array
    {
    }

    // TODO: criar data importante (título, data, matéria opcional)
    public function criar(int $usuarioId, string $titulo, string $data, ?int $materiaId = null): bool
    {
    }

    // TODO: editar data importante
    public function editar(int $id, string $titulo, string $data): bool
    {
    }

    // TODO: excluir data importante
    public function excluir(int $id): bool
    {
    }
}
