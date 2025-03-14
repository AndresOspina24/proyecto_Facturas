<?php
class ControlCliente {
    var $objCli;

    function __construct($objCli){
        $this->objCli = $objCli;
    }

    function guardar(){
        $cod = $this->objCli->getCodigo();
        $email = $this->objCli->getEmail();
        $nombre = $this->objCli->getNombre();
        $telefono = $this->objCli->getTelefono();
        $credito = $this->objCli->getCredito();
        $empresa_codigo = $this->objCli->getEmpresa()->getCodigo();

        $comandoSql = "INSERT INTO cliente(codigo, email, nombre, telefono, credito, empresa_codigo) 
                       VALUES ('$cod', '$email', '$nombre', '$telefono', '$credito', '$empresa_codigo')";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function consultar(){
        $cod = $this->objCli->getCodigo();
        $comandoSql = "SELECT * FROM cliente WHERE codigo = '$cod'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $this->objCli->setEmail($row['email']);
            $this->objCli->setNombre($row['nombre']);
            $this->objCli->setTelefono($row['telefono']);
            $this->objCli->setCredito($row['credito']);
            $this->objCli->setEmpresa(new Empresa($row['empresa_codigo'], ""));
        }
        $objControlConexion->cerrarBd();
        return $this->objCli;
    }

    function modificar(){
        $cod = $this->objCli->getCodigo();
        $email = $this->objCli->getEmail();
        $nombre = $this->objCli->getNombre();
        $telefono = $this->objCli->getTelefono();
        $credito = $this->objCli->getCredito();
        $empresa_codigo = $this->objCli->getEmpresa()->getCodigo();

        $comandoSql = "UPDATE cliente SET email='$email', nombre='$nombre', telefono='$telefono', credito='$credito', 
                       empresa_codigo='$empresa_codigo' WHERE codigo = '$cod'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar(){
        $cod = $this->objCli->getCodigo();
        $comandoSql = "DELETE FROM cliente WHERE codigo = '$cod'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function listar(){
        $comandoSql = "SELECT * FROM cliente";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        $arregloClientes = array();

        while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $objCli = new Cliente("", "", "", "", 0, new Empresa("", ""));
            $objCli->setCodigo($row['codigo']);
            $objCli->setEmail($row['email']);
            $objCli->setNombre($row['nombre']);
            $objCli->setTelefono($row['telefono']);
            $objCli->setCredito($row['credito']);
            $objCli->setEmpresa(new Empresa($row['empresa_codigo'], ""));
            $arregloClientes[] = $objCli;
        }
        $objControlConexion->cerrarBd();
        return $arregloClientes;
    }
}
?>