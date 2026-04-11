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
        header("Location: index.php?accion=animales");
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
    public function showRegister()
    {
    require_once __DIR__ . '/../views/auth/register.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: index.php?accion=register");
        exit;
        }

         $nombre = trim($_POST['nombre'] ?? '');
         $usuario = trim($_POST['usuario'] ?? '');
         $correo = trim($_POST['correo'] ?? '');
         $clave = trim($_POST['clave'] ?? '');
         $telefono = trim($_POST['telefono'] ?? '');
         $direccion = trim($_POST['direccion'] ?? '');
         $vivienda = trim($_POST['vivienda'] ?? '');
         $experiencia = trim($_POST['experiencia'] ?? '');

        if (
        $nombre === '' || $usuario === '' || $correo === '' || $clave === '' ||
        $telefono === '' || $direccion === '' || $vivienda === '' || $experiencia === ''
         ) {
        $_SESSION['error_register'] = "Todos los campos son obligatorios.";
        header("Location: index.php?accion=register");
        exit;
        }

        $existe = $this->model->existeUsuarioOCorreo($usuario, $correo);

        if ($existe) {
        $_SESSION['error_register'] = "El usuario o el correo ya están registrados.";
        header("Location: index.php?accion=register");
        exit;
        }

        $ok = $this->model->registrar(
        $nombre,
        $usuario,
        $correo,
        $clave,
        $telefono,
        $direccion,
        $vivienda,
        $experiencia
        );

        if ($ok) {
        $_SESSION['mensaje_login'] = "Usuario registrado correctamente. Ahora puedes iniciar sesión.";
        header("Location: index.php?accion=login");
        exit;
       } else {
        $_SESSION['error_register'] = "No se pudo registrar el usuario.";
        header("Location: index.php?accion=register");
        exit;
    }
}
}