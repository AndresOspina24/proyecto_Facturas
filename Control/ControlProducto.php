<?php
    class ControlProducto{
        
	   var $objP;

        function __construct($objP){
            $this->objP = $objP;
        }
        function guardar(){
            $cod = $this->objP->getCodigo(); 
            $name = $this->objP->getNombre();
            $st = $this->objP->getStock();
            $v = $this->objP->getValorUnitario();
                
            $comandoSql = "INSERT INTO producto(codigo,nombre,stock,valorUnitario) VALUES ('$cod', '$name', '$st', '$v')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function consultar(){
            $cod= $this->objP->getCodigo(); 
        
            $comandoSql = "SELECT * FROM producto WHERE codigo = '$cod'";
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
            $cod = $this->objP->getCodigo(); 
            $name = $this->objP->getNombre();
            $st = $this->objP->getStock();
            $v = $this->objP->getValorUnitario();
            
            $comandoSql = "UPDATE producto SET nombre='$name' , stock='$st', valorUnitario='$v' WHERE codigo = '$cod'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "", "bd_facturas", 3306);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $cod = $this->objP->getCodigo(); 
            $comandoSql = "DELETE FROM producto WHERE codigo = '$cod'";
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
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloProductos = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objP = new Empresa("","");
                    $objP->setCodigo($row['codigo']);
                    $objP->setNombre($row['nombre']);
                    $objP->setStock($row['stock']);
                    $objP->setValorUnitario($row['valorUnitario']);
                    $arregloProductos[$i] = $objP;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloProductos;
        }
    }