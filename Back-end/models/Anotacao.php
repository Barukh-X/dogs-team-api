<?php

class Anotacao
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // TODO: listar anotações de um usuário, com filtro opcional por matéria e por data
    public function listar_anotacoes(int $usuarioId, ?int $materiaId = null, ?string $data = null): array
    {
    }

    // TODO: criar anotação/resumo (matéria, data, conteúdo)
    public function criar(int $usuarioId, int $materiaId, string $data, string $conteudo): bool
    {
    }

    // TODO: editar anotação
    public function editar(int $id, string $conteudo): bool
    {
    }

    // TODO: excluir anotação
    public function excluir(int $id): bool
    {
    }
}
