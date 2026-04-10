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

        $usuarioId = $_SESSION['usuario_id'] ?? null;
        $ok = $this->model->insertar($usuarioId, $nombre, $contacto, $fecha, $hora, $personas, $motivo, $comentarios);

        $_SESSION['mensaje_publico'] = $ok ? "Cita enviada correctamente." : "No se pudo registrar la cita.";
        header("Location: index.php?accion=citas");
        exit;
    }
}