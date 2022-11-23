<?php

include_once("../conexion.php");
$con = conectar();

$numControl = $_GET['id'];

$sql = "DELETE FROM alumnos WHERE numControl='$numControl'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: alumnos.php");
}
