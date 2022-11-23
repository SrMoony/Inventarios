<?php
include_once("../conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM alumnos WHERE numControl='$id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql2 = "select * from carreras";
$query2 = mysqli_query($con, $sql2); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Actualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <form action="update.php" method="POST">

            <input type="hidden" name="numControl" value="<?php echo $row['numControl']  ?>">
            <select aria-label="carrera" class="form-select text center mb-3" name="carrera" id="carrera">
                <?php foreach ($query2 as $alumnos) : ?>
                    <option value="<?php echo $alumnos['idCarrera'] ?>"><?php echo $alumnos['carrera'] ?></option>
                <?php endforeach ?>
            </select>
            <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres" value="<?php echo $row['nombres']  ?>">
            <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos" value="<?php echo $row['apellidos']  ?>">

            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
        </form>

    </div>
</body>

</html>