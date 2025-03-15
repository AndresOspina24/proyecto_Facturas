<?php
include '../Modelo/Factura.php';
include_once '../Modelo/Cliente.php';
include_once '../Modelo/Empresa.php';
include '../Control/ControlFactura.php';
include '../Control/ControlConexion.php';


$objControlFactura = new ControlFactura(new Factura("", "", 0, new Cliente("", "", "", "", 0, new Empresa("", ""))));

$listaFacturas = $objControlFactura->listar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Facturas</h1>
        <a href="Main.php" class="btn btn-primary">Volver al Menú</a>
        <hr>

        <!-- Tabla para mostrar facturas -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Número</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Cliente</th>
                    <th></th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaFacturas as $factura) { ?>
                    <tr>
                        <td><?php echo $factura->getNumero(); ?></td>
                        <td><?php echo $factura->getFecha(); ?></td>
                        <td><?php echo $factura->getTotal(); ?></td>
                        <td><?php echo $factura->getCliente()->getNombre(); ?></td>
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
