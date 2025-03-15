<?php
include '../Modelo/Vendedor.php';
include '../Control/ControlVendedor.php';
include '../Control/ControlConexion.php';
?>
<?php
$objControlVendedor = new ControlVendedor(new Vendedor("", "", "", "", "", ""));
$listaVendedores = $objControlVendedor->listar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Vendedores</h1>
        <a href="Main.php" class="btn btn-primary">Volver al Menú</a>
        <hr>
        
        <!-- Tabla para mostrar vendedores -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Carné</th>
                    <th>Dirección</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaVendedores as $vendedor) { ?>
                    <tr>
                        <td><?php echo $vendedor->getCodigo(); ?></td>
                        <td><?php echo $vendedor->getEmail(); ?></td>
                        <td><?php echo $vendedor->getNombre(); ?></td>
                        <td><?php echo $vendedor->getTelefono(); ?></td>
                        <td><?php echo $vendedor->getCarne(); ?></td>
                        <td><?php echo $vendedor->getDireccion(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
