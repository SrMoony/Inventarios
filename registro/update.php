<?php

include_once("../conexion.php");
$con = conectar();

$codigo = $_POST['idHerramienta'];
$herramienta = $_POST['herramienta'];
$cantidad = $_POST['cantidad'];
$total = $_POST['max'];

$sql = "UPDATE herramientas SET  herramienta='$herramienta',cantidad='$cantidad', max='$total' WHERE idHerramienta='$codigo'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: v_levantamiento.php");
}
