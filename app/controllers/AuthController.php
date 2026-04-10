<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';

class AuthController
{
    private $model;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();
        $this->model = new Usuario($db);
    }

    public function showLogin()
    {
        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?accion=login");
            exit;
        }

        $usuarioCorreo = trim($_POST['usuario'] ?? '');
        $clave = trim($_POST['clave'] ?? '');

        if ($usuarioCorreo === '' || $clave === '') {
            $_SESSION['error_login'] = "Todos los campos son obligatorios.";
            header("Location: index.php?accion=login");
            exit;
        }

        $usuario = $this->model->buscarPorUsuarioOCorreo($usuarioCorreo);

        if (!$usuario) {
            $_SESSION['error_login'] = "Usuario no encontrado.";
            header("Location: index.php?accion=login");
            exit;
        }

        if ($usuario['estado'] !== 'activo') {
            $_SESSION['error_login'] = "El usuario está inactivo.";
            header("Location: index.php?accion=login");
            exit;
        }

        if ($usuario['clave'] !== $clave) {
            $_SESSION['error_login'] = "Contraseña incorrecta.";
            header("Location: index.php?accion=login");
            exit;
        }

        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        $_SESSION['usuario_rol'] = $usuario['rol'];

        if ($usuario['rol'] === 'admin') {
            header("Location: index.php?accion=dashboard");
        } else {
            header("Location: index.php?accion=perfil");
        }
        exit;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: index.php?accion=login");
        exit;
    }
}