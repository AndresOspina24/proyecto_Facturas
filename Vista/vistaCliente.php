<?php
include '../Modelo/Cliente.php';
include_once '../Modelo/Empresa.php';
include '../Control/ControlCliente.php';
include '../Control/ControlConexion.php';
?>
<?php
$objControlCliente = new ControlCliente(new Cliente("", "", "", "", "", new Empresa("", "")));
$listaClientes = $objControlCliente->listar();
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
                    <th></th>
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
                        <td>
                        <button class="btn btn-warning btn-sm">Editar</button>
                        <button class="btn btn-danger btn-sm">Borrar</button>
                    </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-center gap-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProducto" onclick="setAction('agregar')">Agregar</button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalProducto" onclick="setAction('consultar')">Consultar</button>
        </div>
    </div>
  
</body>
</html>

