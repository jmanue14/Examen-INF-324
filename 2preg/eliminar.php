<?php
// Incluir la conexión a la base de datos
include 'conexion.php';

// Verificar si se ha enviado el parámetro 'id_propiedad' por la URL
if (isset($_GET['id_propiedad'])) {
    $id_propiedad = $_GET['id_propiedad'];

    // Preparar la consulta SQL para eliminar el registro con ese id_propiedad
    $query = "DELETE FROM Propiedad WHERE id_propiedad = ?";
    $stmt = $con->prepare($query);
    
    // Verificar si la consulta se preparó correctamente
    if ($stmt) {
        // Enlazar el parámetro 'id_propiedad' a la consulta SQL
        $stmt->bind_param("i", $id_propiedad);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Si la eliminación es exitosa, redirigir a propiedades.php
            header("Location: datos.php?status=success");
            exit(); // Importante detener el script después de redirigir
        } else {
            // Si la ejecución de la consulta falla, redirigir con error
            header("Location: datos.php?status=error");
            exit();
        }

        // Cerrar la sentencia preparada
        $stmt->close();
    } else {
        // Si la preparación de la consulta falla, redirigir con error
        header("Location: datos.php?status=error");
        exit();
    }
} else {
    // Si no se recibe el parámetro 'id_propiedad', redirigir con error
    header("Location: datos.php?status=missing");
    exit();
}

// Cerrar la conexión a la base de datos
$con->close();
?>
