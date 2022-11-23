<?php
include_once("../conexion.php");
$con = conectar();

$codigo = $_GET['id'];

$sql = "DELETE FROM herramientas WHERE idHerramienta='$codigo'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: v_levantamiento.php");
}
