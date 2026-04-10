<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';

class PerfilController
{
    private $model;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();
        $this->model = new Usuario($db);
    }

    public function showPerfil()
    {
        $this->validarUsuario();

        $id = $_SESSION['usuario_id'];
        $usuario = $this->model->obtenerPorId($id);

        require_once __DIR__ . '/../views/usuario/perfil.php';
    }

    public function actualizarPerfil()
    {
        $this->validarUsuario();

        $id = $_SESSION['usuario_id'];
        $nombre = trim($_POST['nombre'] ?? '');
        $correo = trim($_POST['correo'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $direccion = trim($_POST['direccion'] ?? '');
        $vivienda = trim($_POST['vivienda'] ?? '');
        $experiencia = trim($_POST['experiencia'] ?? '');

        if ($nombre === '' || $correo === '' || $telefono === '' || $direccion === '' || $vivienda === '' || $experiencia === '') {
            $_SESSION['mensaje_perfil'] = "Todos los campos del perfil son obligatorios.";
            header("Location: index.php?accion=perfil");
            exit;
        }

        $ok = $this->model->actualizarPerfil($id, $nombre, $correo, $telefono, $direccion, $vivienda, $experiencia);

        $_SESSION['mensaje_perfil'] = $ok ? "Perfil actualizado correctamente." : "No se pudo actualizar el perfil.";
        header("Location: index.php?accion=perfil");
        exit;
    }

    private function validarUsuario()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?accion=login");
            exit;
        }
    }
}