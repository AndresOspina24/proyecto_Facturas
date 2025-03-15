<?php
class ControlProductosPorFactura {
    var $objProdFact;

    function __construct($objProdFact){
        $this->objProdFact = $objProdFact;
    }

    function guardar(){
        $factura_codigo = $this->objProdFact->getFactura()->getCodigo();
        $producto_codigo = $this->objProdFact->getProducto()->getCodigo();
        $cantidad = $this->objProdFact->getCantidad();

        $comandoSql = "INSERT INTO productos_por_factura(factura_codigo, producto_codigo, cantidad) 
                       VALUES ('$factura_codigo', '$producto_codigo', '$cantidad')";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function consultar(){
        $factura_codigo = $this->objProdFact->getFactura()->getCodigo();
        $producto_codigo = $this->objProdFact->getProducto()->getCodigo();
        $comandoSql = "SELECT * FROM productos_por_factura WHERE factura_codigo = '$factura_codigo' AND producto_codigo = '$producto_codigo'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $this->objProdFact->setCantidad($row['cantidad']);
        }
        $objControlConexion->cerrarBd();
        return $this->objProdFact;
    }

    function modificar(){
        $factura_codigo = $this->objProdFact->getFactura()->getCodigo();
        $producto_codigo = $this->objProdFact->getProducto()->getCodigo();
        $cantidad = $this->objProdFact->getCantidad();

        $comandoSql = "UPDATE productos_por_factura SET cantidad='$cantidad' 
                       WHERE factura_codigo = '$factura_codigo' AND producto_codigo = '$producto_codigo'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar(){
        $factura_codigo = $this->objProdFact->getFactura()->getCodigo();
        $producto_codigo = $this->objProdFact->getProducto()->getCodigo();
        $comandoSql = "DELETE FROM productos_por_factura WHERE factura_codigo = '$factura_codigo' AND producto_codigo = '$producto_codigo'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function listar(){
        $comandoSql = "SELECT * FROM productos_por_factura";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        $arregloProductosPorFactura = array();

        while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $objProdFact = new ProductosPorFactura(new Factura("", "", 0, new Cliente("", "", "", "", 0, new Empresa("", "")), new Vendedor("", "", "")), 
                                                   new Producto("", "", 0), 0);
            $objProdFact->getFactura()->setCodigo($row['factura_codigo']);
            $objProdFact->getProducto()->setCodigo($row['producto_codigo']);
            $objProdFact->setCantidad($row['cantidad']);
            $arregloProductosPorFactura[] = $objProdFact;
        }
        $objControlConexion->cerrarBd();
        return $arregloProductosPorFactura;
    }

    function calcularTotal() {
        $codigoFactura = $this->objFac->getCodigo();
        $comandoSql = "SELECT SUM(p.subtotal * pf.cantidad) AS total 
                       FROM productosporfactura pf 
                       JOIN producto p ON pf.producto_codigo = p.codigo 
                       WHERE pf.numero = '$codigoFactura'";
    
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
    
        $total = 0;
        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
            $total = $row['total'];
        }
    
        $objControlConexion->cerrarBd();
        return $total;
    }
    
}
?>
