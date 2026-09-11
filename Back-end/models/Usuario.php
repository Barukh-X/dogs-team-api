<?php

class Usuario
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // TODO: buscar usuário por login (para autenticação)
    public function buscarPorLogin(string $login): ?array
    {
    }

    // TODO: criar novo usuário (cadastro)
    public function criar(array $dados): bool
    {
    }

    // TODO: buscar usuário por e-mail (recuperação de senha)
    public function buscarPorEmail(string $email): ?array
    {
    }

    // TODO: atualizar senha (redefinição de senha)
    public function atualizarSenha(int $id, string $novaSenhaHash): bool
    {
    }
}
