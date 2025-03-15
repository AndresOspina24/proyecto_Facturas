<?php

class Factura {
    private $fecha;
    private $numero;
    private $total;
    private $cliente;

    public function __construct($fecha, $numero, $total, Cliente $cliente) {
        $this->fecha = $fecha;
        $this->numero = $numero;
        $this->total = $total;
        $this->cliente = $cliente;
    }

    public function getFecha() { return $this->fecha; }
    public function getNumero() { return $this->numero; }
    public function getTotal() { return $this->total; }
    public function getCliente() { return $this->cliente; }

    public function setFecha($fecha) { $this->fecha = $fecha; }
    public function setNumero($numero) { $this->numero = $numero; }
    public function setTotal($total) { $this->total = $total; }
    public function setCliente(Cliente $cliente) { $this->cliente = $cliente;}
    
}

?>