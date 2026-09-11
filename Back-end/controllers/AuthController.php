<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';

class AuthController
{
    private Usuario $usuarioModel;

    public function __construct()
    {
        // TODO: obter $pdo a partir de config/database.php e passar pro Model
        $this->usuarioModel = new Usuario($pdo);
    }

    // TODO: validar login e senha, iniciar sessão ($_SESSION['usuario_id'])
    public function login(): void
    {
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
