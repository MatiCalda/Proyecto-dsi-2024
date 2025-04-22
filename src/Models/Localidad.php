<?php namespace App\Models;

class Localidad {
    public $id;
    public $nombre;
    public $provinciaID;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getProvinciaID() {
        return $this->provinciaID;
    }

    public function setProvinciaID($provinciaID) {
        $this->provinciaID = $provinciaID;
    }
}
