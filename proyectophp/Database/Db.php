<?php 

class Database {
    public $acceso;
    private $server;
    private $username;
    private $password;
    private $database;

    public function __construct() {    
        include "configuracion.php";
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
    }

    public function connect(){
        $this->acceso = mysqli_connect($this->server, $this->username, $this->password, $this->database);
        if ($this->acceso->connect_error) {
            die("Error de conexión: " . $this->acceso->connect_error);
        }
        return $this->acceso; // Devuelve la conexión establecida
    }

    public function desconectar(){
        mysqli_close($this->acceso);
    }
}
?>
