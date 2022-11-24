<?php
include("../conexion.php");
include_once("../registro/barra_navegacion.php");
$con = conectar();
$id = $_GET['id'];

$sql = "SELECT * FROM herramientas WHERE idHerramienta='$id'";
$query = mysqli_query($con, $sql);
$herramienta = mysqli_fetch_array($query);

$sqlAlumno = "SELECT * FROM alumnos a order by a.nombres asc";
$alumno = mysqli_query($con, $sqlAlumno);

$sqlUsuario = "SELECT * FROM usuarios u order by u.nombre asc";
$usuario = mysqli_query($con, $sqlUsuario);

$cantidadActual = intval($herramienta["cantidad"]);
$cantidTotal = intval($herramienta["max"]);


// $res = " ";

// for ($i = 1; $i <= $cantidad; $i++) {
//     $res .= "<option value=" . "{$i}" . ">" . "{$i}" . "</option>";
// }

// var_dump($cantidad);
// die;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamos</title>
    <link rel="shortcut icon" href="../imagenes/icono_herramienta.ico">
    <link rel="stylesheet" href="../estilos/zephyr.css">
    <link rel="stylesheet" href="../estilos/normalize.css">
</head>

<body>
    <div class="container mt-5">
        <form action="prestar_a_alumno.php" method="POST">
            <!-- -------------------------------Este es el apartado para mostrar la herramienta seleccionada----------------------------- -->
            <input type="hidden" name="idHerramienta" value="<?php echo $herramienta['idHerramienta']  ?>">
            <h3><small class="text-muted">se realizara el prestamo de: </small><?php echo $herramienta['herramienta'] ?></h3>
            <br><br>
            <!-- ----------------------------Este es el apartado para insertar al cliente---------------------------------- -->
            <h3><small class="text-muted">al cliente: </small></h3>
            <select aria-label="cliente" class="form-select text center mb-3" name="cliente" id="cliente">
                <?php foreach ($alumno as $alumnos) : ?>
                    <option value="<?php echo $alumnos['numControl'] ?>"><?php echo $alumnos['nombres'] . " " . $alumnos['apellidos'] ?></option>
                <?php endforeach ?>
            </select>
            
            <!-- ----------------------------Este es el apartado para insertar la cantidad-------------------------------------- -->
            <h3><small class="text-muted">cantidad: (actualmente hay <?php echo $cantidadActual ?> de <?php echo $cantidTotal ?>)</small></h3>
            <input type="numeric" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" class="form-control mb-3" name="cantidad" placeholder="cantidad">

            <!-- ----------------------------Este es el apartado para insertar al encargado-------------------------------------- -->
            <h3><small class=" text-muted">Fue prestada por: </small></h3>
            <select aria-label="encargado" class="form-select text center mb-3" name="encargado" id="encargado">
                <?php foreach ($usuario as $usuarios) : ?>
                    <option value="<?php echo $usuarios['idusuario'] ?>"><?php echo $usuarios['nombre'] . " " . $usuarios['apellido'] ?></option>
                <?php endforeach ?>
            </select> 

            <input type="submit" class="btn btn-primary btn-block" value="Prestar">
        </form>
</body>

</html>