<?php
include '../Modelo/Persona.php';
include '../Control/ControlPersona.php';
include '../Control/ControlConexion.php';

?>
<?php
$objControlPersona = new ControlPersona(new Persona("", "", "", ""));
$listaPersonas = $objControlPersona->listar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Personas</h1>
        <a href="Main.php" class="btn btn-primary">Volver al Menú</a>
        <hr>
        
        <!-- Tabla para mostrar personas -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaPersonas as $persona) { ?>
                    <tr>
                        <td><?php echo $persona->getCodigo(); ?></td>
                        <td><?php echo $persona->getEmail(); ?></td>
                        <td><?php echo $persona->getNombre(); ?></td>
                        <td><?php echo $persona->getTelefono(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>



