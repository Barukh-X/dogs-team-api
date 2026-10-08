<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../services/AuthService.php';

class AuthController
{
    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService(ConectarDB());
    }

    public function login(): void
    {
        $dados = json_decode(file_get_contents('php://input'), true);
        
        if(!is_array($dados)) {
            http_response_code(400);
            echo json_encode(['erro' => 'JSON inválido']);
            return;
        }
        
        $logar = $dados['logar'] ?? null;
        $senha = $dados['senha'] ?? null;
        
        if(!$logar || !$senha) {
            http_response_code(400);
            echo json_encode(['erro' => 'Usuário e senha são obrigatórios']);
            return;
        }
        
        $token = $this->authService->autenticar($logar, $senha);

        if($token === null) {
            http_response_code(401);
            echo json_encode(['erro' => 'Usuário ou senha inválidos']);
            return;
        }
        
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode(['sucesso' => true, 'token' => $token]);
    }

    public function cadastrar(): void
    {
        $dados = json_decode(file_get_contents('php://input'), true);
        
        $nome = $dados['nome'] ?? null;
        $usuario = $dados['usuario'] ?? null;
        $email = $dados['email'] ?? null;
        $senha = $dados['senha'] ?? null;
        
        if(!$nome || !$usuario || !$email || !$senha) {
            http_response_code(400);
            echo json_encode(['erro' => 'Preencha todos os campos']);
            return;
        }
        
        try {
            $cadastro = $this->authService->registrar($nome, $usuario, $email, $senha);
            
        if($cadastro) {
            http_response_code(201);
            echo json_encode(['sucesso' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro ao cadastrar usuário']);
        }
        } catch (PDOException $e) {
            http_response_code(409);
            echo json_encode(['erro' => 'Nome de usuário ou email já cadastrados']);
        }
        
    }

    public function logout(): void
    {
        http_response_code(200);
        echo json_encode(['sucesso' => true]);
    }

    public function recuperarSenha(): void
    {
    }

    public function redefinirSenha(): void
    {
    }
}
