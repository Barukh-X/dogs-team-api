<?php

class Usuario
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarPorLogin(string $login): ?array
    {
        $stmt = $this->pdo->prepare('SELECT id, senha, isadmin FROM usuarios WHERE usuario = :user');
        $stmt->execute(['user' => $login]);
        
        $res_busca = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $res_busca ?: null;
    }

    public function criar(string $nome, string $usuario, string $email, string $senha): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, usuario, email, senha) VALUES (:nome, :usuario, :email, :senha)");
        
        return $stmt->execute([
            'nome' => $nome,
            'usuario' => $usuario,
            'email' => $email,
            'senha' => $senha
        ]);
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
