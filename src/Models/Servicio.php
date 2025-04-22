<?php
namespace App\Models;

class Servicio{
    public $id;
    public $cantidad_megas;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCantidad_megas() {
        return $this->cantidad_megas;
    }

    public function setCantidad_megas($cantidad_megas) {
        $this->cantidad_megas = $cantidad_megas;
    }
}