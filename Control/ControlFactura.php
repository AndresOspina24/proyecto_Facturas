<?php
class ControlFactura {
    var $objFac;

    function __construct($objFac){
        $this->objFac = $objFac;
    }

    function guardar(){
        $codigo = $this->objFac->getCodigo();
        $fecha = $this->objFac->getFecha();
        $total = $this->objFac->getTotal();
        $cliente_codigo = $this->objFac->getCliente()->getCodigo();
        $vendedor_codigo = $this->objFac->getVendedor()->getCodigo();

        $comandoSql = "INSERT INTO factura(codigo, fecha, total, cliente_codigo, vendedor_codigo) 
                       VALUES ('$codigo', '$fecha', '$total', '$cliente_codigo', '$vendedor_codigo')";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function consultar(){
        $codigo = $this->objFac->getCodigo();
        $comandoSql = "SELECT * FROM factura WHERE codigo = '$codigo'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $this->objFac->setFecha($row['fecha']);
            $this->objFac->setTotal($row['total']);
            $this->objFac->setCliente(new Cliente($row['cliente_codigo'], "", "", "", 0, new Empresa("", "")));
            $this->objFac->setVendedor(new Vendedor($row['vendedor_codigo'], "", ""));
        }
        $objControlConexion->cerrarBd();
        return $this->objFac;
    }

    function modificar(){
        $codigo = $this->objFac->getCodigo();
        $fecha = $this->objFac->getFecha();
        $total = $this->objFac->getTotal();
        $cliente_codigo = $this->objFac->getCliente()->getCodigo();
        $vendedor_codigo = $this->objFac->getVendedor()->getCodigo();

        $comandoSql = "UPDATE factura SET fecha='$fecha', total='$total', cliente_codigo='$cliente_codigo', 
                       vendedor_codigo='$vendedor_codigo' WHERE codigo = '$codigo'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar(){
        $codigo = $this->objFac->getCodigo();
        $comandoSql = "DELETE FROM factura WHERE codigo = '$codigo'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function listar(){
        $comandoSql = "SELECT * FROM factura";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        $arregloFacturas = array();

        while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $objFac = new Factura("", "", 0, new Cliente("", "", "", "", 0, new Empresa("", "")), new Vendedor("", "", ""));
            $objFac->setCodigo($row['codigo']);
            $objFac->setFecha($row['fecha']);
            $objFac->setTotal($row['total']);
            $objFac->setCliente(new Cliente($row['cliente_codigo'], "", "", "", 0, new Empresa("", "")));
            $objFac->setVendedor(new Vendedor($row['vendedor_codigo'], "", ""));
            $arregloFacturas[] = $objFac;
        }
        $objControlConexion->cerrarBd();
        return $arregloFacturas;
    }
}
?>
