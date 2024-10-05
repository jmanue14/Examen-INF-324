<?php include "../2preg/template/cabecera.php"; ?>

<?php
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo '<div id="successMessage" class="alert alert-success" role="alert">Registro completado con éxito.</div>';
}
?>

<script>
document.addEventListener("DOMContentLoaded", function(event) { 
    setTimeout(function() {
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 3000); // El mensaje se oculta después de 3000 milisegundos, o 3 segundos
});
</script>

<br><br><br><br>
<?php
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo '<div id="successMessage" class="alert alert-success" role="alert">Registro completado con éxito.</div>';
}
?>

<div class="container mt-5">
    <h2>Registrar Persona</h2>
    <form action="procesar_registro.php" method="POST">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
        <div class="mb-3">
            <label for="ci" class="form-label">C.I.</label>
            <input type="text" class="form-control" id="ci" name="ci" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>
        <div class="mb-3">
            <label for="distrito" class="form-label">Distrito</label>
            <select class="form-select" id="distrito" name="distrito" onchange="cargarZonas(this.value)" required>
                <option value="">Seleccione un distrito</option>
                <?php
                include '../conexion.php';
                $query = "SELECT idDistrito, nombre FROM distrito";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['idDistrito']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="zona" class="form-label">Zona</label>
            <select class="form-select" id="zona" name="zona" required>
                <option value="">Seleccione primero un distrito</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>

<script>
function cargarZonas(idDistrito) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("zona").innerHTML = this.responseText;
    }
    xhttp.open("GET", "cargar_zonas.php?idDistrito=" + idDistrito, true);
    xhttp.send();
}
</script>

<?php include "../2preg/template/pie.php"; ?>
