<?php
include '../Modelo/Producto.php';
include '../Control/ControlProducto.php';
include '../Control/ControlConexion.php';

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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaProductos as $producto) { ?>
                    <tr>
                        <td><?php echo $producto->getCodigo(); ?></td>
                        <td><?php echo $producto->getNombre(); ?></td>
                        <td><?php echo $producto->getStock(); ?></td>
                        <td><?php echo $producto->getValorUnitario(); ?></td>
                        <td>
                        <button class="btn btn-warning btn-sm">Editar</button>
                        <button class="btn btn-danger btn-sm">Borrar</button>
                    </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center gap-3">
            <button class="btn btn-primary" onclick="abrirFormulario('agregar')">Agregar</button>
            <button class="btn btn-success" onclick="abrirFormulario('consultar')">Consultar</button>
        </div>
    </div>

</body>
</html>



