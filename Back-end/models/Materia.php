<?php

class Materia
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // TODO: listar matérias de um usuário
    public function listarPorUsuario(int $usuarioId): array
    {
    }

    // TODO: criar matéria
    public function criar(int $usuarioId, string $nome): bool
    {
    }

    // TODO: editar matéria
    public function editar(int $id, string $nome): bool
    {
    }

    // TODO: excluir matéria
    public function excluir(int $id): bool
    {
    }
}
