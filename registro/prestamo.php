<?php
include("../conexion.php");
include_once("./barra_navegacion.php");
$con = conectar();



$sql = "select p.idPrestamo as id, p.idHerramienta as idh , al.numControl, concat(al.nombres, ' ', al.apellidos) as cliente, c.carrera as empleo ,h.herramienta, p.cantidad , DATE_FORMAT(p.fecha, '%d-%m-%Y') as fecha, concat(u.nombre, ' ', u.apellido) as prestamista  
from prestamos p 
join alumnos al on p.numControl = al.numControl
join carreras c on al.Carrera = c.idCarrera 
join herramientas h on p.idHerramienta  = h.idHerramienta
join usuarios u on p.idusuario = u.idusuario 
where p.status = 0
order by cliente asc";
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
    <header class="header">
        <a type="button" class="btn btn-warning" href="../alumno/alumnos.php">Resgistrar un nuevo cliente</a>

    </header>

    <body>
        <h3>Clientes con prestamos activos</h3>
        <div class="col-md-12">
            <table class="table table-bordered ">
                <thead class="table-danger ">
                    <tr>
                        <th>numero Control</th>
                        <th>cliente</th>
                        <th>empleo</th>
                        <th>Herramienta prestada</th>
                        <th>cantidad</th>
                        <th>fecha del prestamo</th>
                        <th>prestamista</th>
                        <th>accion</th>
                    </tr>

                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <th class="text-center"><?php echo $row['numControl'] ?></th>
                            <th class="text-center"><?php echo $row['cliente'] ?></th>
                            <th class="text-center"><?php echo $row['empleo'] ?></th>
                            <th class="text-center"><?php echo $row['herramienta'] ?></th>
                            <th class="text-center"><?php echo $row['cantidad'] ?></th>
                            <th class="text-center"><?php echo $row['fecha'] ?></th>
                            <th class="text-center"><?php echo $row['prestamista'] ?></th>
                            <th><a href="condonar.php?id=<?php echo $row['id'] ?>&idh=<?php echo $row['idh'] ?>&cantidad=<?php echo $row['cantidad'] ?>" class="btn btn-danger">Condonar</a></th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            </thead>
        </div>
    </body>
</body>

</html>