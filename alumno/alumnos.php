<?php
include_once("./barra_2.php");
include_once("../conexion.php");
$con = conectar();

$sql = "select a.numControl, c.carrera, a.nombres, a.apellidos, a.DeudoresSiNo
from alumnos a 
join carreras c  on a.Carrera = c.idCarrera
ORDER BY a.nombres ASC ";
$query = mysqli_query($con, $sql);

$sql2 = "select * from carreras";
$query2 = mysqli_query($con, $sql2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro de Clientes</title>
    <link rel="shortcut icon" href="../imagenes/icono_herramienta.ico">
    <link rel="stylesheet" href="../estilos/zephyr.css">
    <link rel="stylesheet" href="../estilos/normalize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">

            <div class="col-md-3">
                <h1>Ingrese los datos del nuevo cliente</h1>
                <form action="insertar.php" method="POST">
                    <input type="text" class="form-control mb-3" name="numControl" placeholder="Numero de control">
                    <select aria-label="carrera" class="form-select text center mb-3" name="carrera" id="carrera">
                        <?php foreach ($query2 as $alumnos) : ?>
                            <option value="<?php echo $alumnos['idCarrera'] ?>"><?php echo $alumnos['carrera'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres">
                    <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos">

                    <input type="submit" class="btn btn-primary">
                </form>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>Numero de control</th>
                            <th>Nombres</th>
                            <th>pellidos</th>
                            <th>Empleo</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th><?php echo $row['numControl'] ?></th>
                                <th><?php echo $row['nombres'] ?></th>
                                <th><?php echo $row['apellidos'] ?></th>
                                <th><?php echo $row['carrera'] ?></th>
                                <th><a href="actualizar.php?id=<?php echo $row['numControl'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="delete.php?id=<?php echo $row['numControl'] ?>" class="btn btn-danger">Eliminar</a></th>
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