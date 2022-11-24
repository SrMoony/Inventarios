<?php
include_once("../conexion.php");
$con = conectar();

$cantidad = $_POST['cantidad'];
$numControl = $_POST['cliente'];
$idHerramienta = $_POST['idHerramienta'];
$idUsuario = $_POST['encargado'];


function autoincremental($con)
{
    try {
        $auto = "SELECT p.idPrestamo
        FROM prestamos p 
        LIMIT 1 
        ORDER BY p.idPrestamo DESC";

        $response  = $con->query($auto);

        if (count($response) < 1) {
            return 1;
        } else {
            return intval($response[0]["idPrestamo"]) + 1;
        }
    } catch (\Throwable $th) {
        http_response_code(400);
        echo $th;
        die;
    }
}

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

$auto = autoincremental($con);
ActualizarCantidad($con, $cantidad, $idHerramienta);
$fecha = date("Y-m-d");
$sql = "INSERT INTO prestamos VALUES
'$auto',-- idPrestamo  
'$numControl',-- numControl  
'$idHerramienta',-- idHerramienta  
'$fecha',-- fecha 
'$idUsuario'-- idusuario 
";

$query = mysqli_query($con, $sql);



if ($query) {
    Header("Location: v_levantamiento.php");
} else {
}
