<?php

class ProductosPorFactura {
    private $cantidad;
    private $subtotal;
    private $factura; // Relación con Factura
    private $producto; // Relación con Producto

    public function __construct($cantidad, $subtotal, Factura $factura, Producto $producto) {
        $this->cantidad = $cantidad;
        $this->subtotal = $subtotal;
        $this->factura = $factura;
        $this->producto = $producto;
    }

    public function getCantidad() { return $this->cantidad; }
    public function getSubtotal() { return $this->subtotal; }
    public function getFactura() { return $this->factura; }
    public function getProducto() { return $this->producto; }

    public function setCantidad($cantidad) { $this->cantidad = $cantidad; }
    public function setSubtotal($subtotal) { $this->subtotal = $subtotal; }
}
?>