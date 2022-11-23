<?php

include_once("../conexion.php");
$con = conectar();

$numControl = $_POST['numControl'];
$carrera = $_POST['carrera'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];

$sql = "UPDATE alumnos SET  carrera='$carrera',nombres='$nombres',apellidos='$apellidos' WHERE numControl='$numControl'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: alumnos.php");
}
