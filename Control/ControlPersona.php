<?php
class ControlPersona {
    private $objPersona;

    public function __construct($objPersona) {
        $this->objPersona = $objPersona;
    }

    public function guardar() {
        $codigo = $this->objPersona->getCodigo();
        $email = $this->objPersona->getEmail();
        $nombre = $this->objPersona->getNombre();
        $telefono = $this->objPersona->getTelefono();

        $comandoSql = "INSERT INTO persona (codigo, email, nombre, telefono) 
                       VALUES ('$codigo', '$email', '$nombre', '$telefono')";
        
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    public function consultar() {
        $codigo = $this->objPersona->getCodigo();
        
        $comandoSql = "SELECT * FROM persona WHERE codigo = '$codigo'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
            $this->objPersona->setEmail($row['email']);
            $this->objPersona->setNombre($row['nombre']);
            $this->objPersona->setTelefono($row['telefono']);
        }
        $objControlConexion->cerrarBd();
        return $this->objPersona;
    }

    public function modificar() { 
        $codigo = $this->objPersona->getCodigo();
        $email = $this->objPersona->getEmail();
        $nombre = $this->objPersona->getNombre();
        $telefono = $this->objPersona->getTelefono();

        $comandoSql = "UPDATE persona SET email='$email', nombre='$nombre', telefono='$telefono' WHERE codigo = '$codigo'";
        
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    public function borrar() {
        $codigo = $this->objPersona->getCodigo();
        $comandoSql = "DELETE FROM persona WHERE codigo = '$codigo'";
        
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    public function listar() {
        $comandoSql = "SELECT * FROM persona";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

        $arregloPersonas = array();
        while ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
            $objPersona = new Persona("", "", "", "");
            $objPersona->setCodigo($row['codigo']);
            $objPersona->setEmail($row['email']);
            $objPersona->setNombre($row['nombre']);
            $objPersona->setTelefono($row['telefono']);
            $arregloPersonas[] = $objPersona;
        }

        $objControlConexion->cerrarBd();
        return $arregloPersonas;
    }
}
?>
