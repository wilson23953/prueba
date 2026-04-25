<?php
require_once 'app/controllers/empleadosController.php';

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

    case 'guardar':
        $controller->crear();
        break;

    case 'editar':
        $id = $url[2] ?? null;
        $controller->editar($id);
        break;

	case 'eliminar':
        $controller->eliminar();
        break;

    default:
        http_response_code(404);
        echo "Página no encontrada";
}
