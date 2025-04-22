<?php 
namespace App\Models;

class Direccion {
    public $id;
    public $calle;
    public $departamento;
    public $numero;
    public $piso;
    public $localidadID;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCalle() {
        return $this->calle;
    }

    public function setCalle($calle) {
        $this->calle = $calle;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getPiso() {
        return $this->piso;
    }

    public function setPiso($piso) {
        $this->piso = $piso;
    }

    public function getLocalidadID() {
        return $this->localidadID;
    }

    public function setLocalidadID($localidadID) {
        $this->localidadID = $localidadID;
    }
}
