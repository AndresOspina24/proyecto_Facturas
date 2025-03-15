<?php
include_once "Persona.php";

class Vendedor extends Persona {
    private $carne;
    private $direccion;

    public function __construct($codigo, $email, $nombre, $telefono, $carne, $direccion) {
        parent::__construct($codigo, $email, $nombre, $telefono);
        $this->carne = $carne;
        $this->direccion = $direccion;
    }

    public function getCarne() { return $this->carne; }
    public function getDireccion() { return $this->direccion; }

    public function setCarne($carne) { $this->carne = $carne; }
    public function setDireccion($direccion) { $this->direccion = $direccion; }
}

?>