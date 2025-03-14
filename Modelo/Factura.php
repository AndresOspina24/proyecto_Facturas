<?php

class Factura {
    private $fecha;
    private $numero;
    private $total;
    private $cliente;  // Relación con Cliente
    private $vendedor; // Relación con Vendedor

    public function __construct($fecha, $numero, $total, Cliente $cliente, Vendedor $vendedor) {
        $this->fecha = $fecha;
        $this->numero = $numero;
        $this->total = $total;
        $this->cliente = $cliente;
        $this->vendedor = $vendedor;
    }

    public function getFecha() { return $this->fecha; }
    public function getNumero() { return $this->numero; }
    public function getTotal() { return $this->total; }
    public function getCliente() { return $this->cliente; }
    public function getVendedor() { return $this->vendedor; }

    public function setFecha($fecha) { $this->fecha = $fecha; }
    public function setNumero($numero) { $this->numero = $numero; }
    public function setTotal($total) { $this->total = $total; }
}

?>