<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Solicitud.php';
require_once __DIR__ . '/../models/Animal.php';

class SolicitudController
{
    private $model;
    private $animalModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();
        $this->model = new Solicitud($db);
        $this->animalModel = new Animal($db);
    }

    public function guardar()
    {
        if (!isset($_SESSION['usuario_id'])) {
            $_SESSION['error_login'] = "Debes iniciar sesión para enviar una solicitud de adopción.";
            header("Location: index.php?accion=login");
            exit;
        }

        $animalId = trim($_POST['animal_id'] ?? '');
        $nombre = trim($_POST['nombre'] ?? '');
        $contacto = trim($_POST['contacto'] ?? '');
        $edad = trim($_POST['edad'] ?? '');
        $direccion = trim($_POST['direccion'] ?? '');
        $familia = trim($_POST['familia'] ?? '');
        $experiencia = trim($_POST['experiencia'] ?? '');
        $vivienda = trim($_POST['vivienda'] ?? '');
        $motivo = trim($_POST['motivo'] ?? '');

        if ($animalId === '' || $nombre === '' || $contacto === '' || $edad === '' || $direccion === '' || $familia === '' || $experiencia === '' || $vivienda === '' || $motivo === '') {
            $_SESSION['mensaje_publico'] = "Todos los campos de la solicitud son obligatorios.";
            header("Location: index.php?accion=solicitudAdopcion&id=" . $animalId);
            exit;
        }

        if (!is_numeric($edad) || (int)$edad < 18) {
    $_SESSION['mensaje_publico'] = "Solo personas mayores o iguales a 18 años pueden enviar la solicitud.";
    header("Location: index.php?accion=solicitudAdopcion&id=" . $animalId);
    exit;
}

        $usuarioId = $_SESSION['usuario_id'];
        $ok = $this->model->insertar($usuarioId, $animalId, $nombre, $contacto, $edad, $direccion, $familia, $experiencia, $vivienda, $motivo);

        $_SESSION['mensaje_publico'] = $ok ? "Solicitud enviada correctamente." : "No se pudo enviar la solicitud.";
        header("Location: index.php?accion=solicitudAdopcion&id=" . $animalId);
        exit;
    }

    public function misSolicitudes()
    {
        $this->validarUsuario();
        $usuarioId = $_SESSION['usuario_id'];
        $solicitudes = $this->model->obtenerPorUsuario($usuarioId);
        require_once __DIR__ . '/../views/usuario/mis-solicitudes.php';
    }

    public function adminSolicitudes()
    {
        $this->validarAdmin();
        $solicitudes = $this->model->obtenerTodas();
        require_once __DIR__ . '/../views/admin/solicitudes.php';
    }

    public function aprobar()
    {
        $this->validarAdmin();

        $id = $_GET['id'] ?? 0;
        $solicitud = $this->model->obtenerPorId($id);

        if (!$solicitud) {
            $_SESSION['mensaje_admin'] = "Solicitud no encontrada.";
            header("Location: index.php?accion=adminSolicitudes");
            exit;
        }

        if ($solicitud['estado'] !== 'Pendiente') {
            $_SESSION['mensaje_admin'] = "Solo se pueden aprobar solicitudes pendientes.";
            header("Location: index.php?accion=adminSolicitudes");
            exit;
        }

        $this->model->cambiarEstado($id, 'Aprobada');

        $this->animalModel->cambiarEstado($solicitud['animal_id'], 'Adoptado');

        $this->model->denegarOtrasSolicitudesDelAnimal($solicitud['animal_id'], $id);

        $_SESSION['mensaje_admin'] = "Solicitud aprobada correctamente. El animal fue marcado como adoptado.";
        header("Location: index.php?accion=adminSolicitudes");
        exit;
    }

    public function denegar()
    {
        $this->validarAdmin();

        $id = $_GET['id'] ?? 0;
        $solicitud = $this->model->obtenerPorId($id);

        if (!$solicitud) {
            $_SESSION['mensaje_admin'] = "Solicitud no encontrada.";
            header("Location: index.php?accion=adminSolicitudes");
            exit;
        }

        if ($solicitud['estado'] !== 'Pendiente') {
            $_SESSION['mensaje_admin'] = "Solo se pueden denegar solicitudes pendientes.";
            header("Location: index.php?accion=adminSolicitudes");
            exit;
        }

        $this->model->cambiarEstado($id, 'Denegada');

        $_SESSION['mensaje_admin'] = "Solicitud denegada correctamente.";
        header("Location: index.php?accion=adminSolicitudes");
        exit;
    }

    private function validarUsuario()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?accion=login");
            exit;
        }
    }

    private function validarAdmin()
    {
        if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
            header("Location: index.php?accion=login");
            exit;
        }
    }

    public function estadoSolicitud()
    {
        $this->validarUsuario();
        $usuarioId = $_SESSION['usuario_id'];
        $solicitud = $this->model->obtenerUltimaPorUsuario($usuarioId);
        
        require_once __DIR__ . '/../views/usuario/estado-solicitud.php';
    }
}