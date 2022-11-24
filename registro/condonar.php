<?php
include_once("../conexion.php");
date_default_timezone_set('America/Mexico_City');
$con = conectar();

$cantidad = $_GET['cantidad'];
$id = $_GET['id'];
$idh = $_GET['idh'];

function aumentarCantidad($con, $cantidad, $idh)
{
    try {
        $sql = "update herramientas h set h.cantidad = h.cantidad + '$cantidad'
        where h.idHerramienta  = '$idh';";

        $response  = $con->query($sql);
        return $response;
    } catch (\Throwable $th) {
        http_response_code(400);
        echo $th;
        die;
    }
}

function actualizarStatus($con, $id)
{
    try {
        $sql = "update prestamos p set p.status = 1
        where p.idPrestamo  = '$id';";

        $response  = $con->query($sql);
        return $response;
    } catch (\Throwable $th) {
        http_response_code(400);
        echo $th;
        die;
    }
}

aumentarCantidad($con, $cantidad, $idh);
actualizarStatus($con, $id);
Header("Location: prestamo.php");
