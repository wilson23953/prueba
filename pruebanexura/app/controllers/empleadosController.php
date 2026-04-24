<?php
require_once __DIR__ . '/../models/EmpleadoModel.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class EmpleadosController {

    public function index(){
        $model = new EmpleadoModel();
        $datos = $model->listar();

        if (empty($array)) $empleados = [];

        foreach ($datos as $fila) {
            $fila["sexo"] = ($fila["sexo"] == "M") ? "Masculino" : "Femenino";
            $fila["boletin"] = ($fila["boletin"] == 1) ? "Sí" : "No";
            $empleados[] = $fila;
        }

        require_once 'app/views/empleados.php';
    }

    public function nuevo(){
        $model = new EmpleadoModel();
        $datos = [
            'id' => '',
            'nombre' => '',
            'email' => '',
            'sexo' => '',
            'area' => '',
            'descripcion' => '',
            'boletin' => '',
            'rol' => ''
        ];
        
        require_once 'app/views/crearEmpleados.php';
    }

    public function crear(){
        $model = new EmpleadoModel();

        $_POST['boletin'] = $_POST['boletin'] ?? 0;
        $id = $model->crear($_POST);

        if ($id) {
            $model->agregarRoles($id, $_POST['rol']);
        }

        echo json_encode([
            "success" => true
        ]);
    }

    public function eliminar(){
        $id = $_POST['id'];

        $model = new EmpleadoModel();
        $resultado = $model->eliminar($id);

        echo json_encode([
            "success" => true
        ]);
    }

    public function editar($id){

        if (!$id) {
            echo "ID no válido";
            return;
        }

        $model = new EmpleadoModel();
        $datos = $model->mostrarEmpleado($id);

        require_once 'app/views/crearEmpleados.php';
    }
};