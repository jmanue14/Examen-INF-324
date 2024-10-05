<?php
include '../conexion.php';  // Asegúrate de tener la conexión adecuada a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar información del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $direccion = $_POST['direccion'];
    $distrito = $_POST['distrito'];
    $zona = $_POST['zona'];

    // Preparar la consulta SQL para evitar inyecciones SQL
    $query = "INSERT INTO persona (nombre, apellido, ci, direccion, distrito, zona) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ssssss", $nombre, $apellido, $ci, $direccion, $distrito, $zona);
    mysqli_stmt_execute($stmt);

    if(mysqli_stmt_affected_rows($stmt) > 0){
        header('Location: index.php?status=success');
    } else {
        echo "Error al registrar: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
