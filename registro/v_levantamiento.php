<?php
include_once('./barra_navegacion.php');
include_once("../conexion.php");
$con = conectar();

$sql = "SELECT *  FROM herramientas";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamos</title>
    <link rel="shortcut icon" href="../imagenes/icono_herramienta.ico">
    <link rel="stylesheet" href="../estilos/zephyr.css">
    <link rel="stylesheet" href="../estilos/normalize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">

            <div class="col-md-3">
                <h1>Ingrese una nueva herramienta</h1>
                <form action="insertar.php" method="POST">

                    <input type="text" class="form-control mb-3" name="codigo" placeholder="codigo">
                    <input type="text" class="form-control mb-3" name="herramienta" placeholder="herramienta">
                    <input type="text" class="form-control mb-3" name="cantidad" placeholder="cantidad">
                    <input type="text" class="form-control mb-3" name="total" placeholder="total">

                    <input type="submit" class="btn btn-primary">
                </form>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>Codigo</th>
                            <th>Herramienta</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Acciones</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th><?php echo $row['idHerramienta'] ?></th>
                                <th><?php echo $row['herramienta'] ?></th>
                                <th><?php echo $row['cantidad'] ?></th>
                                <th><?php echo $row['max'] ?></th>
                                <th><a href="prestar_herramienta.php?id=<?php echo $row['idHerramienta'] ?>" class="btn btn-success"><i class="material-icons">play_for_work</i>prestamo</a></th>
                                <th><a href="actualizar.php?id=<?php echo $row['idHerramienta'] ?>" class="btn btn-info"><i class="material-icons">create</i>Editar</a></th>
                                <th><a href="borrar.php?id=<?php echo $row['idHerramienta'] ?>" class="btn btn-danger"><i class="material-icons">delete</i>Borrar</a></th>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>