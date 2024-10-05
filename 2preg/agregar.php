<?php
session_start();
include('conexion.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el id_persona de la sesión
    $id_persona = $_SESSION['id_persona'];
    
    // Obtener los datos del formulario
    $codigo_catastral = $_POST['codigo_catastral'];
    $direccion = $_POST['direccion'];
    $superficie = $_POST['superficie'];
    $distrito = $_POST['distrito'];
    $latitud1 = $_POST['latitud1'];
    $longitud1 = $_POST['longitud1'];
    $latitud2 = $_POST['latitud2'];
    $longitud2 = $_POST['longitud2'];

    // Insertar los datos de la propiedad en la base de datos
    $sql = "INSERT INTO propiedad (codigo_catastral, direccion, superficie, distrito, latitud1, longitud1, latitud2, longitud2, id_persona) 
            VALUES ('$codigo_catastral', '$direccion', '$superficie', '$distrito', '$latitud1', '$longitud1', '$latitud2', '$longitud2', '$id_persona')";

    if ($con->query($sql) === TRUE) {
        $_SESSION['mensaje'] = "Registro agregado exitosamente";
        // Redirigir a la página terminal.php después de agregar la propiedad
        header('Location: datos.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

include "template/cabecera.php";
?>


include "template/cabecera.php";
?>

<br><br><br><br>
<div class="vh-90 d-flex justify-content-center align-items-center pt-4" style="padding-bottom: 5rem;"> <!-- Ajuste para agregar padding al fondo -->
    <div class="card shadow" style="max-width: 600px; width: 100%;">
        <form class="p-4" action="agregar.php" method="POST">
            <h4 class="mb-3">Registro de Propiedad</h4>
            <div class="mb-3">
                <label for="codigo_catastral" class="form-label">Código Catastral</label>
                <input type="text" class="form-control" id="codigo_catastral" name="codigo_catastral" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección de la Propiedad</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="mb-3">
                <label for="superficie" class="form-label">Superficie (m²)</label>
                <input type="number" class="form-control" id="superficie" name="superficie" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="distrito" class="form-label">Distrito</label>
                <input type="text" class="form-control" id="distrito" name="distrito" required>
            </div>
            <div class="mb-3">
                <label for="latitud1" class="form-label">Latitud de la Esquina 1</label>
                <input type="number" class="form-control" id="latitud1" name="latitud1" step="0.0001" required>
            </div>
            <div class="mb-3">
                <label for="longitud1" class="form-label">Longitud de la Esquina 1</label>
                <input type="number" class="form-control" id="longitud1" name="longitud1" step="0.0001" required>
            </div>
            <div class="mb-3">
                <label for="latitud2" class="form-label">Latitud de la Esquina 2</label>
                <input type="number" class="form-control" id="latitud2" name="latitud2" step="0.0001" required>
            </div>
            <div class="mb-3">
                <label for="longitud2" class="form-label">Longitud de la Esquina 2</label>
                <input type="number" class="form-control" id="longitud2" name="longitud2" step="0.0001" required>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Agregar</button>
                <a href="tramites.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<!-- Mostrar información de la sesión (opcional para pruebas) -->
<?php echo $_SESSION['nombre_cuenta']." - ID Persona: ".$_SESSION['id_persona']; ?>

<?php include "template/pie.php"; ?>
