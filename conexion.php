<?php
$con = new mysqli("localhost", "root", "", "bdexam324");

if ($con->connect_error) {
    die("Error en la conexión: " . $con->connect_error);
}
?>
