<?php
require_once __DIR__ . '/../models/EmpleadoModel.php';

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

        if($_POST['id']){
            $model->editarEmpleado($_POST);
            echo json_encode([
                "success" => true,
                "mensaje" => 'Empleado editado'
            ]);
            exit();
        }

        if($model->validarEmail($_POST['email'])){
            echo json_encode([
                "success" => false,
                "mensaje" => 'Ya existe el correo'
            ]);
        } else {
            $id = $model->crear($_POST);
            if ($id) {
                $model->agregarRoles($id, $_POST['rol']);
            }
            echo json_encode([
                "success" => true,
                "mensaje" => 'Empleado creado'
            ]);
            exit();
        }
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
        $model = new EmpleadoModel();
        if($id){
            $datos = $model->mostrarEmpleado($id);
        }
        require_once 'app/views/crearEmpleados.php';
    }
};