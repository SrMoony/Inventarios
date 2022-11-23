<?php
include_once("../conexion.php");
$con = conectar();

$codigo = $_POST['codigo'];
$herramienta = $_POST['herramienta'];
$cantidad = $_POST['cantidad'];
$total = $_POST['total'];


$sql = "INSERT INTO herramientas VALUES('$codigo','$herramienta','$cantidad','$total')";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: v_levantamiento.php");
} else {
}
