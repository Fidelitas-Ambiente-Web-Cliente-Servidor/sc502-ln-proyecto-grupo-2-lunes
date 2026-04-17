<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Cita.php';

class CitaController
{
    private $model;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();
        $this->model = new Cita($db);
    }

    public function guardar()
    {
        if (!isset($_SESSION['usuario_id'])) {
            $_SESSION['error_login'] = "Debes iniciar sesión para agendar una cita.";
            header("Location: index.php?accion=login");
            exit;
        }

        $nombre = trim($_POST['nombre'] ?? '');
        $contacto = trim($_POST['contacto'] ?? '');
        $fecha = trim($_POST['fecha'] ?? '');
        $hora = trim($_POST['hora'] ?? '');
        $personas = trim($_POST['personas'] ?? '');
        $motivo = trim($_POST['motivo'] ?? '');
        $comentarios = trim($_POST['comentarios'] ?? '');

        if ($nombre === '' || $contacto === '' || $fecha === '' || $hora === '' || $personas === '' || $motivo === '' || $comentarios === '') {
            $_SESSION['mensaje_publico'] = "Todos los campos de la cita son obligatorios.";
            header("Location: index.php?accion=citas");
            exit;
        }

        $usuarioId = $_SESSION['usuario_id'];
        $ok = $this->model->insertar($usuarioId, $nombre, $contacto, $fecha, $hora, $personas, $motivo, $comentarios);

        $_SESSION['mensaje_publico'] = $ok ? "Cita enviada correctamente." : "No se pudo registrar la cita.";
        header("Location: index.php?accion=citas");
        exit;
    }

    public function adminCitas()
    {
        $this->validarAdmin();
        $citas = $this->model->obtenerTodas();
        require_once __DIR__ . '/../views/admin/citas.php';
    }

    private function validarAdmin()
    {
        
        if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
            header("Location: index.php?accion=login");
            exit;
        }
    }

    public function historialUsuario()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?accion=login");
            exit;
        }

        $usuarioId = $_SESSION['usuario_id'];
        $citas = $this->model->obtenerPorUsuario($usuarioId);

        require_once __DIR__ . '/../views/usuario/historial-citas.php';
    }
}