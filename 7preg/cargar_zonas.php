<?php
include '../conexion.php'; // Asegúrate de tener un archivo que gestione la conexión a la base de datos.

$idDistrito = $_GET['idDistrito'];

$query = "SELECT idZona, nombre FROM zona WHERE idDistrito = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "i", $idDistrito);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $idZona, $nombre);

$zonas = "<option value=''>Seleccione una zona</option>";
while (mysqli_stmt_fetch($stmt)) {
    $zonas .= "<option value='{$idZona}'>{$nombre}</option>";
}

mysqli_stmt_close($stmt);
echo $zonas;
?>
