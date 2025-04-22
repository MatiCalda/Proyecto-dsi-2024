<?php
namespace App\Models;
use App\Models\Persona;

class Cliente extends Persona{
    public $numero_telefonico;

    public function getNumero_telefonico() {
        return $this->numero_telefonico;
    }

    public function setNumero_telefonico($numero_telefonico) {
        $this->numero_telefonico = $numero_telefonico;
    }
}
