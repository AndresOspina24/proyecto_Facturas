<?php
include '../Modelo/Cliente.php';
include_once '../Modelo/Empresa.php';
include '../Control/ControlCliente.php';
include '../Control/ControlConexion.php';
?>
<?php
$objControlCliente = new ControlCliente(new Cliente("", "", "", "", "", new Empresa("", "")));
$listaClientes = $objControlCliente->listar();

// Verificar si hay datos antes de recorrer el foreach
if (!isset($listaClientes) || !is_array($listaClientes)) {
    $listaClientes = []; // Si está vacío, evita el error en foreach
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Clientes</h1>
        <a href="Main.php" class="btn btn-primary">Volver al Menú</a>
        <hr>
        
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Empresa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaClientes as $cliente) { ?>
                    <tr>
                        <td><?php echo $cliente->getCodigo(); ?></td>
                        <td><?php echo $cliente->getEmail(); ?></td>
                        <td><?php echo $cliente->getNombre(); ?></td>
                        <td><?php echo $cliente->getTelefono(); ?></td>
                        <td><?php echo $cliente->getEmpresa()->getNombre(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

