<?php
include "template/cabecera.php";
include "conexion.php";

session_start();

// Verificar si el usuario ha iniciado sesión y obtener su id_persona
$id_persona = isset($_SESSION['id_persona']) ? $_SESSION['id_persona'] : null;

// Mostrar mensajes basados en el estado (status) recibido
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        echo "<div class='alert alert-success'>Registro eliminado con éxito.</div>";
    } elseif ($_GET['status'] == 'error') {
        echo "<div class='alert alert-danger'>Hubo un error al intentar eliminar el registro.</div>";
    } elseif ($_GET['status'] == 'missing') {
        echo "<div class='alert alert-warning'>No se recibió el parámetro necesario.</div>";
    }
}

// Consulta para obtener los datos completos de la propiedad de la persona que inició sesión
$query = "SELECT pr.id_propiedad, pr.codigo_catastral, pr.direccion, pr.latitud1, pr.longitud1, pr.latitud2, pr.longitud2, pr.superficie, pr.distrito
          FROM Propiedad pr
          WHERE pr.id_persona = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('i', $id_persona);
$stmt->execute();
$result = $stmt->get_result();

$propiedades = [];
while ($row = $result->fetch_assoc()) {
    $propiedades[] = $row;
}
?>
<br><br><br>
<div class="container d-flex justify-content-center align-items-center" style="width: 50rem;">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Código Catastral</th>
                <th scope="col">Dirección</th>
                <th scope="col">Latitud 1</th>
                <th scope="col">Longitud 1</th>
                <th scope="col">Latitud 2</th>
                <th scope="col">Longitud 2</th>
                <th scope="col">Superficie (m²)</th>
                <th scope="col">Distrito</th>
                <th scope="col" width="200px">Operaciones</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($propiedades as $fila) { ?>
                <tr>
                    <td><?php echo $fila['codigo_catastral']; ?></td>
                    <td><?php echo $fila['direccion']; ?></td>
                    <td><?php echo $fila['latitud1']; ?></td>
                    <td><?php echo $fila['longitud1']; ?></td>
                    <td><?php echo $fila['latitud2']; ?></td>
                    <td><?php echo $fila['longitud2']; ?></td>
                    <td><?php echo $fila['superficie']; ?></td>
                    <td><?php echo $fila['distrito']; ?></td>
                    <td>
                        <button type="button" class="btn btn-success"
                            onclick="window.location.href='actualizar.php?id_propiedad=<?php echo $fila['id_propiedad']; ?>';">Actualizar</button>
                        <button type="button" class="btn btn-danger"
                            onclick="if(confirm('¿Estás seguro de que deseas eliminar este registro?')) { window.location.href='eliminar.php?id_propiedad=<?php echo $fila['id_propiedad']; ?>'; }">Eliminar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="9">
                <button type="button" class="btn btn-info"
                onclick="window.location.href='agregar.php';">Agregar</button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<?php include "template/pie.php"; ?>
