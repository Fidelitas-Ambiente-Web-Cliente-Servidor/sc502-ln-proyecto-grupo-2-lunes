<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Donacion.php';

class DonacionController
{
    private $model;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();
        $this->model = new Donacion($db);
    }

    public function guardar()
    {
        $nombre = trim($_POST['nombre'] ?? '');
        $contacto = trim($_POST['contacto'] ?? '');
        $monto = trim($_POST['monto'] ?? '');
        $metodo = trim($_POST['metodo'] ?? '');

        if ($nombre === '' || $contacto === '' || $monto === '' || $metodo === '') {
            $_SESSION['mensaje_publico'] = "Todos los campos de la donación son obligatorios.";
            header("Location: index.php?accion=donaciones");
            exit;
        }

        $ok = $this->model->insertar($nombre, $contacto, $monto, $metodo);

        $_SESSION['mensaje_publico'] = $ok ? "Donación registrada correctamente." : "No se pudo registrar la donación.";
        header("Location: index.php?accion=donaciones");
        exit;
    }

    public function adminDonaciones()
    {
        $this->validarAdmin();
        $donaciones = $this->model->obtenerTodas();
        require_once __DIR__ . '/../views/admin/donaciones.php';
    }

    private function validarAdmin()
    {
        if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
            header("Location: index.php?accion=login");
            exit;
        }
    }
}