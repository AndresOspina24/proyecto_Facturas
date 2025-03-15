<?php
include_once "Persona.php";
    class Cliente extends Persona {
        private $credito;
        private $empresa; // Relación con Empresa
    
        public function __construct($codigo, $email, $nombre, $telefono, $credito, Empresa $empresa) {
            parent::__construct($codigo, $email, $nombre, $telefono);
            $this->credito = $credito;
            $this->empresa = $empresa;
        }
    
        public function getCredito() { return $this->credito; }
        public function getEmpresa() { return $this->empresa; }
        public function setCredito($credito) { $this->credito = $credito; }
        public function setEmpresa(Empresa $empresa) { $this->empresa = $empresa; }
    }


?>