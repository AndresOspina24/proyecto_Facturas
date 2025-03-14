<?php
class Empresa {
    private string $codigo;
    private string $nombre;

    public function __construct($codigo, $nombre) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
    }

    public function getCodigo(): string { return $this->codigo; }
    public function getNombre(): string { return $this->nombre; }
    public function setCodigo($codigo): void { $this->codigo = $codigo; }
    public function setNombre($nombre): void { $this->nombre = $nombre; }
}

?>