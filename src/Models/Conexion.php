<?php 
namespace App\Models;

class Conexion {
    public $id;
    public $fechaAlta;
    public $direccionID;
    public $servicioID;
    public $clienteID;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFechaAlta() {
        return $this->fechaAlta;
    }

    public function setFechaAlta($fechaAlta) {
        $this->fechaAlta = $fechaAlta;
    }

    public function getDireccionID() {
        return $this->direccionID;
    }

    public function setDireccionID($direccionID) {
        $this->direccionID = $direccionID;
    }

    public function getServicioID() {
        return $this->servicioID;
    }

    public function setServicioID($servicioID) {
        $this->servicioID = $servicioID;
    }

    public function getClienteID() {
        return $this->clienteID;
    }

    public function setClienteID($clienteID) {
        $this->clienteID = $clienteID;
    }
}
