<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Animal.php';

class AnimalController
{
    private $model;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();
        $this->model = new Animal($db);
    }

    public function index()
    {
        $animales = $this->model->obtenerTodosDisponibles();
        require_once __DIR__ . '/../views/public/animales.php';
    }

    public function show()
    {
        $id = $_GET['id'] ?? 0;
        $animal = $this->model->obtenerPorId($id);

        if (!$animal) {
            echo "Animal no encontrado.";
            return;
        }

        require_once __DIR__ . '/../views/public/animal.php';
    }

    public function adminIndex()
    {
        $this->validarAdmin();
        $animales = $this->model->obtenerTodos();
        require_once __DIR__ . '/../views/admin/animales.php';
    }

    public function guardar()
    {
        $this->validarAdmin();

        $nombre = trim($_POST['nombre'] ?? '');
        $especie = trim($_POST['especie'] ?? '');
        $edad = trim($_POST['edad'] ?? '');
        $tamano = trim($_POST['tamano'] ?? '');
        $estado = trim($_POST['estado'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $imagen = trim($_POST['imagen'] ?? '');

        if ($nombre === '' || $especie === '' || $edad === '' || $tamano === '' || $estado === '' || $descripcion === '') {
            $_SESSION['mensaje_admin'] = "Todos los campos del animal son obligatorios.";
            header("Location: index.php?accion=adminAnimales");
            exit;
        }

        $ok = $this->model->insertar($nombre, $especie, $edad, $tamano, $estado, $descripcion, $imagen);

        $_SESSION['mensaje_admin'] = $ok ? "Animal guardado correctamente." : "No se pudo guardar el animal.";
        header("Location: index.php?accion=adminAnimales");
        exit;
    }

    private function validarAdmin()
    {
        if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
            header("Location: index.php?accion=login");
            exit;
        }
    }
}