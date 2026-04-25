<?php
require_once __DIR__ . '/../../Database.php';

class EmpleadoModel {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    public function listar() {
        try {
            $sql = "SELECT e.id, e.nombre, e.email, e.sexo, e.descripcion, e.boletin, a.nombre AS area 
                    FROM empleados AS e
                    INNER JOIN areas AS a 
                    ON e.area_id = a.id;";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function mostrarEmpleado($id) {
        try {
            $sql = "SELECT e.id, e.nombre, e.email, e.sexo, e.descripcion, e.boletin, a.id AS area, er.rol_id AS rol
                    FROM empleados AS e
                    INNER JOIN areas AS a ON e.area_id = a.id
                    INNER JOIN empleado_rol AS er ON e.id = er.empleado_id
                    WHERE e.id = ?";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function crear($data){
        try {
            $sql = "INSERT INTO empleados (nombre, email, sexo, area_id, descripcion, boletin) VALUES (?, ?, ?, ?, ?, ?)";
        
            $stmt = $this->db->prepare($sql);
            $data = $stmt->execute([
                $data['nombre'],
                $data['email'],
                $data['sexo'],
                $data['area'],
                $data['descripcion'],
                $data['boletin']
            ]);

            if ($data) {
                return $this->db->lastInsertId();
            } else {
                return false;
            }

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function eliminar($id){
        try {
            $sql = "DELETE FROM empleados WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id]);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function agregarRoles($id, $rol){
        try {
            $sql = "INSERT INTO empleado_rol (empleado_id, rol_id) VALUES (?, ?)";
        
            $stmt = $this->db->prepare($sql);
            $stmt->execute([ $id, $rol]);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function editarEmpleado($data){
        $sql = "UPDATE empleados 
                SET nombre = ?, email = ?, sexo = ?, area_id = ?, descripcion = ?, boletin = ?
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);
        $data = $stmt->execute([$data['nombre'],$data['email'],$data['sexo'],$data['area'],$data['descripcion'],$data['boletin'], $data['id']]);

        return $data;
    }

    public function validarEmail($email){
        try {
            $sql = "SELECT COUNT(*) FROM empleados WHERE email LIKE ?";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$email]);
            return $stmt->fetchColumn() > 0;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
};