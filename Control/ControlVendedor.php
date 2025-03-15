<?php
class ControlVendedor {
    var $objVen;

    function __construct($objVen){
        $this->objVen = $objVen;
    }

    function guardar(){
        $codigo = $this->objVen->getCodigo();
        $nombre = $this->objVen->getNombre();
        $telefono = $this->objVen->getTelefono();

        $comandoSql = "INSERT INTO vendedor(codigo, nombre, telefono) VALUES ('$codigo', '$nombre', '$telefono')";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function consultar(){
        $codigo = $this->objVen->getCodigo();
        $comandoSql = "SELECT * FROM vendedor WHERE codigo = '$codigo'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $this->objVen->setNombre($row['nombre']);
            $this->objVen->setTelefono($row['telefono']);
        }
        $objControlConexion->cerrarBd();
        return $this->objVen;
    }

    function modificar(){
        $codigo = $this->objVen->getCodigo();
        $nombre = $this->objVen->getNombre();
        $telefono = $this->objVen->getTelefono();

        $comandoSql = "UPDATE vendedor SET nombre='$nombre', telefono='$telefono' WHERE codigo = '$codigo'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar(){
        $codigo = $this->objVen->getCodigo();
        $comandoSql = "DELETE FROM vendedor WHERE codigo = '$codigo'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function listar(){
        $comandoSql = "SELECT p.codigo, p.email, p.nombre, p.telefono, v.carne, v.direccion
                   FROM vendedor v
                   JOIN persona p ON v.codigo = p.codigo";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        $arregloVendedores = array();

        while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $objVen = new Vendedor("", "", "", "", "", "");
            $objVen->setCodigo($row['codigo']);
            $objVen->setEmail($row['email']);
            $objVen->setNombre($row['nombre']);
            $objVen->setTelefono($row['telefono']);
            $objVen->setCarne($row['carne']);
            $objVen->setDireccion($row['direccion']);
            $arregloVendedores[] = $objVen;
        }
        $objControlConexion->cerrarBd();
        return $arregloVendedores;
    }
}
?>

