<?php

include_once "Database/Db.php";

class user extends Database{
  
    private $conexion;


    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function registrar($tabla, $datos) {
        switch ($tabla) {
            case 'usuarios':
                $stmt = $this->conexion->acceso->prepare("INSERT INTO usuarios (usu_nombre, usu_docum, usu_clave, rol_id) VALUES (?, ?, ?, ?)");
                if ($stmt === false) {
                    die("Error al preparar la consulta SQL: " . $this->conexion->acceso->error);
                }
                $stmt->bind_param("sisi", $datos['nombre'], $datos['documento'], $datos['clave'], $datos['rol']);
                break;

            case 'roles':
                $stmt = $this->conexion->acceso->prepare("INSERT INTO roles (rol_nombre) VALUES (?)");
                if ($stmt === false) {
                    die("Error al preparar la consulta SQL: " . $this->conexion->acceso->error);
                }
                $stmt->bind_param("s", $datos['nombre']);
                break;

            case 'paciente':
                $stmt = $this->conexion->acceso->prepare("INSERT INTO paciente (pac_docum, pac_nombre, pac_apellido, pac_direccion, pac_telefono, est_id) VALUES (?, ?, ?, ?, ?, ?)");
                if ($stmt === false) {
                    die("Error al preparar la consulta SQL: " . $this->conexion->acceso->error);
                }
                $stmt->bind_param("isssii", $datos['documento'], $datos['nombre'], $datos['apellido'], $datos['direccion'], $datos['telefono'],  $datos['estrato']);
                break;

            case 'estratos':
                $stmt = $this->conexion->acceso->prepare("INSERT INTO estratos (est_nombre) VALUES (?)");
                if ($stmt === false) {
                    die("Error al preparar la consulta SQL: " . $this->conexion->acceso->error);
                }
                $stmt->bind_param("s", $datos['nombre']);
                break;    
        }

        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true; 
        } else {
            return false; 
        }
    }

            public function consultar($conexion, $tabla, $columnas = array('*'), $condiciones = '', $valores = array()) {
                switch ($tabla) {
                    case 'usuarios':
                        // Convertir el array de columnas en una cadena separada por comas
                        $columnas_str = implode(', ', $columnas);
                        $sql = "SELECT $columnas_str FROM usuarios";
                        if (!empty($condiciones)) {
                            $sql .= " WHERE $condiciones";
                        }
                        $stmt = $conexion->prepare($sql);
                        if ($stmt === false) {
                            die("Error al preparar la consulta SQL: " . $conexion->error);
                        }
                        if (!empty($valores)) {
                            // Enlazar los valores de los parámetros si se proporcionaron
                            $types = str_repeat('s', count($valores)); // Suponemos que todos los valores son de tipo string
                            $stmt->bind_param($types, ...$valores);
                        }
                        $stmt->execute();
                        $resultado = $stmt->get_result();
                        $datos = $resultado->fetch_all(MYSQLI_ASSOC);
                        $stmt->close();
                        return $datos;
                        break;


                    case 'paciente':
                        // Convertir el array de columnas en una cadena separada por comas
                        $columnas_str = implode(', ', $columnas);
                        $sql = "SELECT $columnas_str FROM paciente";
                        if (!empty($condiciones)) {
                            $sql .= " WHERE $condiciones";
                        }
                        $stmt = $conexion->prepare($sql);
                        if ($stmt === false) {
                            die("Error al preparar la consulta SQL: " . $conexion->error);
                        }
                        if (!empty($valores)) {
                            // Enlazar los valores de los parámetros
                            $types = str_repeat('s', count($valores));
                            $stmt->bind_param($types, ...$valores);
                        }
                        $stmt->execute();
                        $resultado = $stmt->get_result();
                        $datos = $resultado->fetch_all(MYSQLI_ASSOC);
                        $stmt->close();
                        return $datos;
                        break;

                    case 'roles':
                        
                        $columnas_str = implode(', ', $columnas);
                        $sql = "SELECT $columnas_str FROM roles";
                        if (!empty($condiciones)) {
                            $sql .= " WHERE $condiciones";
                        }
                        $stmt = $conexion->prepare($sql);
                        if ($stmt === false) {
                            die("Error al preparar la consulta SQL: " . $conexion->error);
                        }
                        if (!empty($valores)) {
                            // Enlazar los valores de los parámetros
                            $types = str_repeat('s', count($valores));
                            $stmt->bind_param($types, ...$valores);
                        }
                        $stmt->execute();
                        $resultado = $stmt->get_result();
                        $datos = $resultado->fetch_all(MYSQLI_ASSOC);
                        $stmt->close();
                        return $datos;
                        break;

                    case 'estratos':
                            
                            $columnas_str = implode(', ', $columnas);
                            $sql = "SELECT $columnas_str FROM estratos";
                            if (!empty($condiciones)) {
                                $sql .= " WHERE $condiciones";
                            }
                            $stmt = $conexion->prepare($sql);
                            if ($stmt === false) {
                                die("Error al preparar la consulta SQL: " . $conexion->error);
                            }
                            if (!empty($valores)) {
                            
                                $types = str_repeat('s', count($valores));
                                $stmt->bind_param($types, ...$valores);
                            }
                            $stmt->execute();
                            $resultado = $stmt->get_result();
                            $datos = $resultado->fetch_all(MYSQLI_ASSOC);
                            $stmt->close();
                            return $datos;
                            break;
   
                }
            }

        
            public function editar($conexion, $tabla, $datos, $condiciones) {
                switch ($tabla) {
                    case 'usuarios':
                        $sql = "UPDATE usuarios SET usu_nombre = ?, usu_docum = ?, usu_clave = ?, rol_id = ? WHERE $condiciones";
                        $stmt = $conexion->prepare($sql);
                        if ($stmt === false) {
                            die("Error al preparar la consulta SQL: " . $conexion->error);
                        }
                        $stmt->bind_param("sisi", $datos['nombre'], $datos['documento'], $datos['clave'], $datos['rol']);
                        $stmt->execute();
                        if ($stmt->affected_rows > 0) {
                            return true;
                        } else {
                            return false;
                        }
                        break;
                } 
            }
        }           
?>