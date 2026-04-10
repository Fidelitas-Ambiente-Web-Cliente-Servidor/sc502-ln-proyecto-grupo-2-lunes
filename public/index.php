<?php

session_start();

require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/AnimalController.php';
require_once __DIR__ . '/../app/controllers/PerfilController.php';
require_once __DIR__ . '/../app/controllers/CitaController.php';
require_once __DIR__ . '/../app/controllers/SolicitudController.php';
require_once __DIR__ . '/../app/controllers/DonacionController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';

$accion = $_GET['accion'] ?? 'inicio';

switch ($accion) {

    case 'inicio':
        require_once __DIR__ . '/../app/views/public/index.php';
        break;

    case 'login':
        (new AuthController())->showLogin();
        break;

    case 'loginPost':
        (new AuthController())->login();
        break;

    case 'logout':
        (new AuthController())->logout();
        break;

    case 'sobre':
        require_once __DIR__ . '/../app/views/public/sobre.php';
        break;

    case 'animales':
        (new AnimalController())->index();
        break;

    case 'animal':
        (new AnimalController())->show();
        break;

    case 'citas':
        require_once __DIR__ . '/../app/views/public/citas.php';
        break;

    case 'guardarCita':
        (new CitaController())->guardar();
        break;

    case 'consejos':
        require_once __DIR__ . '/../app/views/public/consejos.php';
        break;

    case 'contacto':
        require_once __DIR__ . '/../app/views/public/contacto.php';
        break;

    case 'donaciones':
        require_once __DIR__ . '/../app/views/public/donaciones.php';
        break;

    case 'guardarDonacion':
        (new DonacionController())->guardar();
        break;

    case 'solicitudAdopcion':
        require_once __DIR__ . '/../app/views/public/solicitud-adopcion.php';
        break;

    case 'guardarSolicitud':
        (new SolicitudController())->guardar();
        break;

    case 'perfil':
        (new PerfilController())->showPerfil();
        break;

    case 'actualizarPerfil':
        (new PerfilController())->actualizarPerfil();
        break;

    case 'misSolicitudes':
        (new SolicitudController())->misSolicitudes();
        break;

    case 'estadoSolicitud':
        $solicitud = [];
        require_once __DIR__ . '/../app/views/usuario/estado-solicitud.php';
        break;

    case 'historialCitas':
        $citas = [];
        require_once __DIR__ . '/../app/views/usuario/historial-citas.php';
        break;

    case 'postAdopcion':
        require_once __DIR__ . '/../app/views/usuario/post-adopcion.php';
        break;

    case 'dashboard':
        (new AdminController())->dashboard();
        break;

    case 'adminAnimales':
        (new AnimalController())->adminIndex();
        break;

    case 'guardarAnimal':
        (new AnimalController())->guardar();
        break;

    case 'adminSolicitudes':
        (new SolicitudController())->adminSolicitudes();
        break;

    case 'adminDonaciones':
        (new DonacionController())->adminDonaciones();
        break;

    case 'adminAdopciones':
        $solicitudes = [];
        require_once __DIR__ . '/../app/views/admin/adopciones.php';
        break;

    case 'adminContenido':
        require_once __DIR__ . '/../app/views/admin/contenido.php';
        break;

    case 'adminReportes':
        $totalAnimales = 0;
        $totalSolicitudes = 0;
        $totalDonaciones = 0;
        require_once __DIR__ . '/../app/views/admin/reportes.php';
        break;

    default:
        echo "Acción no encontrada.";
        break;
    
        case 'register':
        $controller = new AuthController();
        $controller->showRegister();
        break;

        case 'guardarRegistro':
        $controller = new AuthController();
        $controller->register();
        break;
}