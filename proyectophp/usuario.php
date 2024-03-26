<?php

class usuario {
    private $usu_id;
    private $usu_Docu;
    private $usu_nombre;
    private $usu_Clave;
    private $usu_rol_id;

    public function __construct() {
    }

    public function getId() {
        return $this->usu_id;
    }

    public function setId($usu_id) {
        $this->usu_id = $usu_id;
    }

    public function getDocu() {
        return $this->usu_Docu;
    }

    public function setDocu($usu_Docu) {
        $this->usu_Docu = $usu_Docu;
    }

    public function getNombre() {
        return $this->usu_nombre;
    }

    public function setNombre($usu_nombre) {
        $this->usu_nombre = $usu_nombre;
    }

    public function getClave() {
        return $this->usu_Clave;
    }

    public function setClave($usu_Clave) {
        $this->usu_Clave = $usu_Clave;
    }

    public function getRol() {
        return $this->usu_rol_id;
    }

    public function setRol($usu_rol_id) {
        $this->usu_rol_id = $usu_rol_id;
    }
}
