<?php
require_once 'app/controllers/empleadosController.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = explode('/', trim($_GET['url'] ?? '', '/'));
$method = $url[1] ?? 'index';
$controller = new EmpleadosController();

switch ($method) {
    case 'index':
        $controller->index();
        break;

    case 'nuevo':
        $controller->nuevo();
        break;

    case 'crear':
        $controller->crear();
        break;

    case 'editar':
        $id = $url[2];
        $controller->editar($id);
        break;

	case 'eliminar':
        $controller->eliminar();
        break;

    default:
        http_response_code(404);
        echo "Página no encontrada";
}
