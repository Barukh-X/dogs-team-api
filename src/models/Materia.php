<?php

class Materia
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function listar_materias(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM materias');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar(string $nome_materia): bool
    {
        $stmt = $this->pdo->prepare('INSERT INTO materias (nome_materia) VALUES (:nome_materia)');

        return $stmt->execute(['nome_materia' => $nome_materia]);
    }

    public function editar(int $id, string $nome_materia): bool
    {
        $stmt = $this->pdo->prepare('UPDATE materias SET nome_materia = :nome_materia WHERE id = :id');
        $stmt->execute(['nome_materia' => $nome_materia, 'id' => $id]);

        return $stmt->rowCount() > 0;
    }

    public function excluir(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM materias WHERE id = :id');
        $stmt->execute(['id' => $id]);

        return $stmt->rowCount() > 0;
    }
}
