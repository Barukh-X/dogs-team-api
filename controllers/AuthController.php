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
        
        session_regenerate_id(true);
        
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['isadmin'] = $usuario['isadmin'];
        
        header('Content-Type: application/json');
        
        http_response_code(200);
        
        echo json_encode(['sucesso' => 'true']);
    }

    public function cadastrar(): void
    {
        $dados = json_decode(file_get_contents('php://input'), true);
        
        $nome = $dados['nome'] ?? null;
        $usuario = $dados['username'] ?? null;
        $email = $dados['email'] ?? null;
        $senha = $dados['senha'] ?? null;
        
        if(!$nome || !$usuario || !$email || !$senha) {
            http_response_code(400);
            echo json_encode(['erro' => 'Preencha todos os campos']);
            return;
        }
        
        try {
            $cadastro = $this->usuarioModel->criar($nome, $usuario, $email, $senha);
            
        if($cadastro) {
            http_response_code(201);
            echo json_encode(['sucesso' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro ao cadastrar usuário']);
        }
        } catch (PDOExeption $e) {
            http_response_code(409);
            echo json_encode(['erro' => 'Nome de usuário ou email já cadastrados']);
        }
        
    }

    public function logout(): void
    {
        require_once __DIR__ . '/../includes/auth_check.php';
        
        $_SESSION = [];
        
        session_destroy();
        
        header('Content-Type: application/json');
        echo json_encode(['sucesso' => 'true']);
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
