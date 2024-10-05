<?php
include 'conexion.php';

if (isset($_GET['id_persona'])) {
    $id_persona = $_GET['id_persona'];
    
    // Obtener la persona por ID
    $result_persona = $mysqli->query("SELECT * FROM Persona WHERE id_persona = $id_persona");
    $persona = $result_persona->fetch_assoc();

    // Obtener la propiedad asociada
    $result_propiedad = $mysqli->query("SELECT * FROM Propiedad WHERE id_persona = $id_persona");
    $propiedad = $result_propiedad->fetch_assoc();
}

// Actualizar persona
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $direccion_persona = $_POST['direccion_persona'];
    $codigo_catastral = $_POST['codigo_catastral'];
    $direccion_propiedad = $_POST['direccion_propiedad'];

    // Actualizar persona
    $sql_persona = "UPDATE Persona SET nombre = '$nombre', apellido = '$apellido', ci = '$ci', direccion = '$direccion_persona' 
                    WHERE id_persona = $id_persona";
    $mysqli->query($sql_persona);

    // Actualizar propiedad
    $sql_propiedad = "UPDATE Propiedad SET codigo_catastral = '$codigo_catastral', direccion = '$direccion_propiedad' 
                      WHERE id_persona = $id_persona";
    $mysqli->query($sql_propiedad);

    header("Location: index.php");
}
?>
