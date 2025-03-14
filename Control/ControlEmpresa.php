<?php
    class ControlEmpresa{
        
	   var $objEmp;

        function __construct($objEmp){
            $this->objEmp = $objEmp;
        }
        function guardar(){
            $cod = $this->objEmp->getCodigo(); 
            $name = $this->objEmp->getNombre();
                
            $comandoSql = "INSERT INTO empresa(codigo,nombre) VALUES ('$cod', '$name')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function consultar(){
            $cod= $this->objEmp->getCodigo(); 
        
            $comandoSql = "SELECT * FROM empresa WHERE codigo = '$cod'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objEmp->setNombre($row['nombre']);
            }
            $objControlConexion->cerrarBd();
            return $this->objEmp;
        }

        function modificar(){ 
            $cod = $this->objEmp->getCodigo(); 
            $name = $this->objEmp->getNombre();
            
            $comandoSql = "UPDATE empresa SET nombre='$name' WHERE codigo = '$cod'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $cod = $this->objEmp->getCodigo(); 
            $comandoSql = "DELETE FROM empresa WHERE codigo = '$cod'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM empresa";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloEmpresas = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objEmp = new Empresa("","");
                    $objEmp->setCodigo($row['codigo']);
                    $objEmp->setNombre($row['nombre']);
                    $arregloEmpresas[$i] = $objEmp;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloEmpresas;
        }
    }