<?php
class ControlProducto {
    var $objPro;

    function __construct($objPro){
        $this->objPro = $objPro;
    }

    function guardar(){
        $codigo = $this->objPro->getCodigo();
        $nombre = $this->objPro->getNombre();
        $precio = $this->objPro->getPrecio();

        $comandoSql = "INSERT INTO producto(codigo, nombre, precio) VALUES ('$codigo', '$nombre', '$precio')";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function consultar(){
        $codigo = $this->objPro->getCodigo();
        $comandoSql = "SELECT * FROM producto WHERE codigo = '$codigo'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $this->objPro->setNombre($row['nombre']);
            $this->objPro->setPrecio($row['precio']);
        }
        $objControlConexion->cerrarBd();
        return $this->objPro;
    }

    function modificar(){
        $codigo = $this->objPro->getCodigo();
        $nombre = $this->objPro->getNombre();
        $precio = $this->objPro->getPrecio();

        $comandoSql = "UPDATE producto SET nombre='$nombre', precio='$precio' WHERE codigo = '$codigo'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar(){
        $codigo = $this->objPro->getCodigo();
        $comandoSql = "DELETE FROM producto WHERE codigo = '$codigo'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function listar(){
        $comandoSql = "SELECT * FROM producto";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        $arregloProductos = array();

        while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $objPro = new Producto("", "", "", "");
            $objPro->setCodigo($row['codigo']);
            $objPro->setNombre($row['nombre']);
            $objPro->setStock($row['stock']);
            $objPro->setValorUnitario($row['valorUnitario']);
            $arregloProductos[] = $objPro;
        }
        $objControlConexion->cerrarBd();
        return $arregloProductos;
    }
}
?>
