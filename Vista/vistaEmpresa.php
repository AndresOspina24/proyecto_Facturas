<?php
include '../Modelo/Empresa.php';
include '../Control/ControlEmpresa.php';
include '../Control/ControlConexion.php';
//$boton="";
//
//switch ($boton) {
//    case "guardar":
//        $objEmp= new Empresa("2","Mech");
//        $objControlEmpresa= new ControlEmpresa($objEmp);
//        $objControlEmpresa->guardar();
//        break;
//    case "modificar":
//        $objEmp= new Empresa("22","Mechitas");
//        $objControlEmpresa= new ControlEmpresa($objEmp);
//        $objControlEmpresa->modificar();
//        break;
//    case "borrar":
//        $objEmp= new Empresa("","Mech");
//        $objControlEmpresa= new ControlEmpresa($objEmp);
//        $objControlEmpresa->borrar();
//        break;
//    case "consultar":
//        $objEmp= new Empresa("22","Mechitas");
//        $objControlEmpresa= new ControlEmpresa($objEmp);
//        $objControlEmpresa->consultar();
//        echo $objEmp->getCodigo();
//        echo "<br>";
//        echo $objEmp->getNombre();
//        echo "<br>";
//        break;
//}
//
//echo "xd";
////tarea hacer funcionar el modificar y el borrar
?>
<?php
$objControlEmpresa = new ControlEmpresa(new Empresa("", ""));
$listaEmpresas = $objControlEmpresa->listar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Empresas</h1>
        <a href="Main.php" class="btn btn-primary">Volver al Menú</a>
        <hr>
        
        <!-- Tabla para mostrar empresas -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaEmpresas as $empresa) { ?>
                    <tr>
                        <td><?php echo $empresa->getCodigo(); ?></td>
                        <td><?php echo $empresa->getNombre(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>