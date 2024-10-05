<?php
session_start();
include('conexion.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el id_persona y id_propiedad de la sesión o del formulario
    $id_persona = $_SESSION['id_persona'];
    $id_propiedad = $_POST['id_propiedad']; // Asumiendo que también pasas el ID de la propiedad en el formulario

    // Obtener los datos del formulario
    $codigo_catastral = $_POST['codigo_catastral'];
    $direccion = $_POST['direccion'];
    $superficie = $_POST['superficie'];
    $distrito = $_POST['distrito'];
    $latitud1 = $_POST['latitud1'];
    $longitud1 = $_POST['longitud1'];
    $latitud2 = $_POST['latitud2'];
    $longitud2 = $_POST['longitud2'];

    // Actualizar los datos de la propiedad en la base de datos
    $sql = "UPDATE propiedad SET 
                codigo_catastral = '$codigo_catastral', 
                direccion = '$direccion', 
                superficie = '$superficie', 
                distrito = '$distrito', 
                latitud1 = '$latitud1', 
                longitud1 = '$longitud1', 
                latitud2 = '$latitud2', 
                longitud2 = '$longitud2'
            WHERE id_propiedad = '$id_propiedad' AND id_persona = '$id_persona'";

    if ($con->query($sql) === TRUE) {
        $_SESSION['mensaje'] = "Registro actualizado exitosamente";
        // Redirigir a la página terminal.php después de actualizar la propiedad
        header('Location: datos.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

// Cargar datos actuales si se ha pasado un ID de propiedad
if (isset($_GET['id_propiedad'])) {
    $id_propiedad = $_GET['id_propiedad'];
    $sql = "SELECT * FROM propiedad WHERE id_propiedad = '$id_propiedad' LIMIT 1";
    $resultado = $con->query($sql);
    if ($resultado->num_rows > 0) {
        $propiedad = $resultado->fetch_assoc();
    } else {
        echo "No se encontró la propiedad";
        exit;
    }
}

include "template/cabecera.php";
?>
<br><br><br><br>
<h1>Avtualizar Datos</h1>
<div class="vh-90 d-flex justify-content-center align-items-center pt-4" style="padding-bottom: 5rem;"> <!-- Ajuste para agregar padding al fondo -->
<div class="card shadow" style="max-width: 600px; width: 100%;">
        <form class="row g-3 p-3" action="actualizar.php?id_propiedad=<?php echo $id_propiedad; ?>" method="POST">
            <input type="hidden" name="id_propiedad" value="<?php echo $id_propiedad; ?>">
            <!-- Resto del formulario con los valores actuales -->
            <div class="col-12">
                <label for="codigo_catastral" class="form-label">Código Catastral</label>
                <input type="text" class="form-control" id="codigo_catastral" name="codigo_catastral" value="<?php echo $propiedad['codigo_catastral']; ?>" required>
            </div>
            <div class="col-12">
                <label for="direccion" class="form-label">Dirección de la Propiedad</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $propiedad['direccion']; ?>" placeholder="Calle, número, barrio..." required>
            </div>
            <div class="col-12">
                <label for="superficie" class="form-label">Superficie (m²)</label>
                <input type="number" step="0.01" class="form-control" id="superficie" name="superficie" value="<?php echo $propiedad['superficie']; ?>" required>
            </div>
            <div class="col-12">
                <label for="distrito" class="form-label">Distrito</label>
                <input type="text" class="form-control" id="distrito" name="distrito" value="<?php echo $propiedad['distrito']; ?>" required>
            </div>
            <!-- Coordenadas para la primera esquina -->
            <div class="col-12">
                <label for="latitud1" class="form-label">Latitud de la Esquina 1</label>
                <input type="number" step="0.000001" class="form-control" id="latitud1" name="latitud1" value="<?php echo $propiedad['latitud1']; ?>" required>
            </div>
            <div class="col-12">
                <label for="longitud1" class="form-label">Longitud de la Esquina 1</label>
                <input type="number" step="0.000001" class="form-control" id="longitud1" name="longitud1" value="<?php echo $propiedad['longitud1']; ?>" required>
            </div>
            <!-- Coordenadas para la segunda esquina -->
            <div class="col-12">
                <label for="latitud2" class="form-label">Latitud de la Esquina 2</label>
                <input type="number" step="0.000001" class="form-control" id="latitud2" name="latitud2" value="<?php echo $propiedad['latitud2']; ?>" required>
            </div>
            <div class="col-12">
                <label for="longitud2" class="form-label">Longitud de la Esquina 2</label>
                <input type="number" step="0.000001" class="form-control" id="longitud2" name="longitud2" value="<?php echo $propiedad['longitud2']; ?>" required>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary w-100">Actualizar</button>
            </div>
            <div class="col-6">
                <a href="tramites.php" class="btn btn-danger w-100">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php include "template/pie.php"; ?>
