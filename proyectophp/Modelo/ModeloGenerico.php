<?php

include_once "conexionBD.php";

class user extends conexionBD{
  
    private $conexion;
   

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function registrar($tabla, $datos) {
        switch ($tabla) {
            case 'usuarios':
                $campos = "'usu_nombre','usu_docum', 'usu_clave', 'rol_id'";
                $valores = "{$datos['usu_nombre']}, {$datos['usu_docum']}, '{$datos['usu_clave']}', {$datos['rol_id']}";
                break;
            case 'roles':
                $campos = "'rol_nombre'";
                $valores = "'{$datos['rol_nombre']}'";
                break;
            case 'paciente':
                $campos = "'pac_nombre', 'pac_apellido', 'pac_direccion', 'pac_telefono'";
                $valores = "'{$datos['pac_nombre']}', '{$datos['pac_apellido']}', '{$datos['pac_direccion']}', {$datos['pac_telefono']}";
                break;
            case 'estratos':
                $campos = "'est_nombre'";
                $valores = "'{$datos['est_nombre']}'";
                break;
            default:
                return false;
        }

        $sql = "INSERT INTO `$tabla` ($campos) VALUES ($valores)";

        return $this->conexion->query($sql);
    } 

    public function getUser($identificationuser, $password){
    $sql="SELECT * FROM  suario Where documentoidentificacion='$identificationuser' AND contraseña=' $password' ";

    $result= $this->connnect()->query(sql);
    $numRows = $result->num_rows;

    if ($numRows==1){
        return true;
    }
    return false;


    }
    
}
?>