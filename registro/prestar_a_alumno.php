<?php
include_once("../conexion.php");
date_default_timezone_set('America/Mexico_City');
$con = conectar();

$cantidad = $_POST['cantidad'];
$numControl = $_POST['cliente'];
$idHerramienta = $_POST['idHerramienta'];
$idUsuario = $_POST['encargado'];


function ActualizarCantidad($con, $cantidad, $idHerramienta)
{
    try {
        $sql = "update herramientas h set h.cantidad = h.cantidad - '$cantidad'
        where h.idHerramienta  = '$idHerramienta';";

        $response  = $con->query($sql);
        return $response;
    } catch (\Throwable $th) {
        http_response_code(400);
        echo $th;
        die;
    }
}


ActualizarCantidad($con, $cantidad, $idHerramienta);
$fecha = date('Y-m-d');
$sql = "INSERT INTO prestamos  (numControl, idHerramienta, cantidad, fecha, idusuario, status ) VALUES
('$numControl',
'$idHerramienta',
'$cantidad', 
'$fecha',
'$idUsuario',
0
);";

$query = mysqli_query($con, $sql);



if ($query) {
    Header("Location: v_levantamiento.php");
} else {
}
