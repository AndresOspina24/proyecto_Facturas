<?php
include '../Modelo/Producto.php';
include '../Control/ControlProducto.php';
include '../Control/ControlConexion.php';
//$boton="";
//
//switch ($boton) {
//    case "guardar":
//        $objPro= new Producto("2","Mech");
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

//tarea hacer funcionar el modificar y el borrar
?>
<?php
$objControlProducto = new ControlProducto(new Producto("", "", "", ""));
$listaProductos = $objControlProducto->listar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Productos</h1>
        <a href="Main.php" class="btn btn-primary">Volver al Menú</a>
        <hr>
        
        <!-- Tabla para mostrar productos -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Valor Unitario</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaProductos as $producto) { ?>
                    <tr>
                        <td><?php echo $producto->getCodigo(); ?></td>
                        <td><?php echo $producto->getNombre(); ?></td>
                        <td><?php echo $producto->getStock(); ?></td>
                        <td><?php echo $producto->getValorUnitario(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

