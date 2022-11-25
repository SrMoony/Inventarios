<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="shortcut icon" href="./imagenes/icono_herramienta.ico">
    <link rel="stylesheet" href="./estilos/normalize.css">
    <link rel="stylesheet" href="./estilos/zephyr.css">
    <link rel="stylesheet" href="./estilos/cabezera.css">
    <link rel="stylesheet" href="./estilos/login.css">
</head>

<body>
    <main class="main">
        <form action="validar.php" method="POST">
            <img src="./imagenes/logo2.png" alt="">
            <h1 style="color: white; text-shadow: black 0.1em 0.1em 0.2em">Bienvenido al sistema de prestamos</h1>
            <p>Usuario <input autocomplete="off" type="text" placeholder="Ingrese su nombre de usuario" name="usuario"></p>
            <p>Contraseña <input autocomplete="off" value=" " id="contra" onload="vaciar()" type="Password" placeholder="Ingrese su contraseña" name="contraseña"></p>
            <button type="submit" value="Ingresar" class="btn btn-primary">ingresar</button>
        </form>
    </main>
</body>

</html>