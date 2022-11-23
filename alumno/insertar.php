<?php
include_once("../conexion.php");
$con = conectar();

$numControl = $_POST['numControl'];
$carrera = $_POST['carrera'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];


$sql = "INSERT INTO alumnos VALUES('$numControl','$carrera','$nombres','$apellidos',0)";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: alumnos.php");
} else {
}
