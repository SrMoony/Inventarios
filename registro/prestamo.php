<?php
include_once("./barra_navegacion.php");
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <header class="header">

    </header>

    <body>
        <h3>Clientes con prestamos activos</h3>
        <div class="col-md-12">
            <table class="table">
                <thead class="table-danger table-striped">
                    <tr>
                        <th>numero Control</th>
                        <th>alumno</th>
                        <th>Herramienta prestada</th>
                        <th>cantidad</th>
                        <th>fecha del prestamo</th>
                        <th>prestamista</th>
                        <th>accion</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <a type="button" class="btn btn-warning" href="../alumno/alumnos.php">Resgistrar un nuevo cliente</a>
        </div>
    </body>
</body>

</html>