<?php
include("../conexion.php");
include_once("../registro/barra_navegacion.php");
$con = conectar(); 
$codigo = $_GET['id'];

$sql = "SELECT * FROM herramientas WHERE idHerramienta='$codigo'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Prestamos</title>
    <link rel="shortcut icon" href="../imagenes/icono_herramienta.ico">
    <link rel="stylesheet" href="../estilos/zephyr.css">
    <link rel="stylesheet" href="../estilos/normalize.css">
</head>

<body>
    <div class="container mt-5">
        <form action="update.php" method="POST">

            <input type="hidden" name="idHerramienta" value="<?php echo $row['idHerramienta']  ?>">

            <input type="text" class="form-control mb-3" name="herramienta" placeholder="herramienta" value="<?php echo $row['herramienta']  ?>">
            <input type="numeric" class="form-control mb-3" name="cantidad" placeholder="cantidad" value="<?php echo $row['cantidad']  ?>">
            <input type="numeric" class="form-control mb-3" name="max" placeholder="total" value="<?php echo $row['max']  ?>">
            <!-- <input type="numeric" class="form-control mb-3" name="total" placeholder="total" value="<?php echo $row['total']  ?>"> -->

            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
        </form>

    </div>
</body>

</html>