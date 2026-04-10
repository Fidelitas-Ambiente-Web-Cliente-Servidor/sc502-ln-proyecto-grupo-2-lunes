<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Animal.php';
require_once __DIR__ . '/../models/Solicitud.php';
require_once __DIR__ . '/../models/Donacion.php';

class AdminController
{
    private $animalModel;
    private $solicitudModel;
    private $donacionModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();

        $this->animalModel = new Animal($db);
        $this->solicitudModel = new Solicitud($db);
        $this->donacionModel = new Donacion($db);
    }

    public function dashboard()
    {
        $this->validarAdmin();

        $totalAnimales = $this->animalModel->contarDisponibles();
        $totalSolicitudes = $this->solicitudModel->contarPendientes();
        $totalDonaciones = $this->donacionModel->sumarDonaciones();

        require_once __DIR__ . '/../views/admin/dashboard.php';
    }

    private function validarAdmin()
    {
        if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
            header("Location: index.php?accion=login");
            exit;
        }
    }
}