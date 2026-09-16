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

    // TODO: validar login e senha, iniciar sessão ($_SESSION['usuario_id'])
    public function login(): void
    {
        $dados = json_decode(file_get_contents('php://input'), true);
        $username = $dados['username'] ?? null;
        $senha = $dados['senha'] ?? null;
        
        if(!$username || !$senha) {
            http_response_code(400);
            echo json_encode(['erro' => 'Usário ou senha inválido s']);
            return;
        }
        
        $usuario = $this->usuarioModel->buscarPorLogin($username);
        
        if($usuraio === null || !password_verify($usuario['senha'], $senha)) {
            
        }
    }

    // TODO: validar dados do formulário e criar usuário
    public function cadastrar(): void
    {
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
