<?php

class Materia
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function listar_materias(): ?array
    {
        $stmt = $this->pdo->query('SELECT * FROM materias');
        $materias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $materias ?: null;
    }

    public function criar(string $nome_materia): bool
    {
        $stmt = $this->pdo->prepare('INSERT INTO materias (nome_materia) VALUES (:nome_materia)');
        
        return $stmt->execute([':nome_materia' => $nome_materia]);
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
