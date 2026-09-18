<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';


class AuthController
{
    private Usuario $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario(ConectarDB());
    }

    public function login(): void
    {
        $dados = json_decode(file_get_contents('php://input'), true);
        $username = $dados['username'] ?? null;
        $senha = $dados['senha'] ?? null;
        
        if(!$username || !$senha) {
            http_response_code(400);
            echo json_encode(['erro' => 'Usuário e senha são obrigatórios']);
            return;
        }
        
        $usuario = $this->usuarioModel->buscarPorLogin($username);
        
        if($usuario === null || !password_verify($senha, $usuario['senha'])) {
            http_response_code(401);
            echo json_encode(['erro' => 'Usuário ou senha inválidos']);
            return;
        }
        
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['isadmin'] = $usuario['isadmin'];
    }

    // TODO: validar dados do formulário e criar usuário
    public function cadastrar(): void
    {
        $dados = json_decode(file_get_contents('php://input'), true);
        
        $nome = $dados['nome'] ?? null;
        $username = $dados['username'] ?? null;
        $email = $dados['email'] ?? null;
        $senha = $dados['senha'] ?? null;   
        
    }

    // TODO: encerrar sessão e redirecionar pro login
    public function logout(): void
    {
    }

    // TODO: gerar token e enviar e-mail de recuperação
    public function recuperarSenha(): void
    {
    }

    // TODO: validar token e salvar nova senha
    public function redefinirSenha(): void
    {
    }
}
