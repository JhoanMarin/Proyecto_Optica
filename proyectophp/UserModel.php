<?php 
include 'Database/Db.php';

class User extends Database{

    public function getUser($username, $password){
        $sql = "SELECT * FROM usuarios WHERE usu_docum = '$username' AND usu_clave ='$password'";

        $result = $this->connect()->query($sql); // Aquí llamamos al método connect() para obtener la conexión

        $numRows = $result->num_rows;
        if($numRows == 1){
            return true;
        }

        return false;
    }

    public function getUserName($documento) {
        $sql = "SELECT usu_nombre FROM usuarios WHERE usu_docum = '$documento'";
        $result = $this->connect()->query($sql); // Aquí llamamos al método connect() para obtener la conexión
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row['usu_nombre']; // Devuelve el nombre de usuario
        } else {
            return null;
        }
    }
}
?>

