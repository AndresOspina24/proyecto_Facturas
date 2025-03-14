<?php
include '../Modelo/Empresa.php';
include '../Control/ControlEmpresa.php';
include '../Control/ControlConexion.php';
$boton="guardar";

switch ($boton) {
    case "guardar":
        $objEmp= new Empresa("2","Mech");
        $objControlEmpresa= new ControlEmpresa($objEmp);
        $objControlEmpresa->guardar();
        break;
    case "modificar":
        $objEmp= new Empresa("22","Mechitas");
        $objControlEmpresa= new ControlEmpresa($objEmp);
        $objControlEmpresa->modificar();
        break;
    case "borrar":
        $objEmp= new Empresa("","Mech");
        $objControlEmpresa= new ControlEmpresa($objEmp);
        $objControlEmpresa->borrar();
        break;
    case "consultar":
        $objEmp= new Empresa("22","Mechitas");
        $objControlEmpresa= new ControlEmpresa($objEmp);
        $objControlEmpresa->consultar();
        echo $objEmp->getCodigo();
        echo "<br>";
        echo $objEmp->getNombre();
        echo "<br>";
        break;
}

//echo "xd";
//tarea hacer funcionar el modificar y el borrar
?>