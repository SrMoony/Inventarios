<?php
include("../conexion.php");
include_once("../registro/barra_navegacion.php");
$con = conectar();
$id = $_GET['id'];

$sql = "SELECT * FROM herramientas WHERE idHerramienta='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamos</title>
    <link rel="shortcut icon" href="../imagenes/icono_herramienta.ico">
    <link rel="stylesheet" href="../estilos/zephyr.css">
    <link rel="stylesheet" href="../estilos/normalize.css">
</head>

<body>
    <div class="container mt-5">
        <form action="prestar_a_alumno.php" method="POST">

            <input type="hidden" name="idHerramienta" value="<?php echo $row['idHerramienta']  ?>">

            <input type="text" class="form-control mb-3" name="herramienta" placeholder="herramienta" value="<?php echo $row['herramienta']  ?>">
            <input type="numeric" class="form-control mb-3" name="cantidad" placeholder="cantidad" value="<?php echo $row['cantidad']  ?>">
            <input type="numeric" class="form-control mb-3" name="max" placeholder="total" value="<?php echo $row['max']  ?>">
            <!-- <input type="numeric" class="form-control mb-3" name="total" placeholder="total" value="<?php echo $row['total']  ?>"> -->

            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
        </form>
</body>

</html>