<?php
// Parámetros de conexión a la base de datos
include "../conexion.php";

// Crear conexión

// Verificar conexión
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// Consulta SQL
$sql = "SELECT 
            p.nombre,
            p.apellido,
            SUM(CASE WHEN i.tipo_impuesto = 'alto' THEN 1 ELSE 0 END) AS Impuesto_Alto,
            SUM(CASE WHEN i.tipo_impuesto = 'medio' THEN 1 ELSE 0 END) AS Impuesto_Medio,
            SUM(CASE WHEN i.tipo_impuesto = 'bajo' THEN 1 ELSE 0 END) AS Impuesto_Bajo
        FROM 
            persona p
        JOIN 
            propiedad pr ON p.id_persona = pr.id_persona
        JOIN 
            impuesto i ON pr.codigo_catastral = i.codigo_catastral
        GROUP BY 
            p.nombre, p.apellido";

// Ejecutar la consulta
$result = $con->query($sql);

// Verificar si la consulta devuelve filas
if ($result->num_rows > 0) {
    // Crear tabla HTML
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Apellido</th><th>Impuesto Alto</th><th>Impuesto Medio</th><th>Impuesto Bajo</th></tr>";

    // Rellenar tabla con datos
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nombre"] . "</td><td>" . $row["apellido"] . "</td><td>" . $row["Impuesto_Alto"] . "</td><td>" . $row["Impuesto_Medio"] . "</td><td>" . $row["Impuesto_Bajo"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
// Cerrar conexión
$con->close();
?>
