<?php include "template/cabecera.php";
if (isset($_SESSION['mensaje'])) {
    echo "<p>" . $_SESSION['mensaje'] . "</p>";
    unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
}
?>

<!-- Sección Hero -->
<section class="hero-section">
        <div class="container">
            <h1>Catastro HAM-LP</h1>
            <p>Gestión eficiente de las propiedades del municipio</p>
            <a href="datos.php" class="btn btn-custom">Ver Trámites</a>
        </div>
    </section>

    <!-- Sección de trámites -->
    <section id="tramites" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Trámites Disponibles</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-custom h-100 text-center">
                        <div class="card-body">
                            <i class="bi bi-file-earmark-plus fs-1 text-primary"></i>
                            <h5 class="card-title mt-3">Registro de Propiedades</h5>
                            <p class="card-text">Inscribe tu propiedad en el sistema catastral de la HAM-LP.</p>
                            <a href="agregar.php" class="btn btn-outline-primary">Registrar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-custom h-100 text-center">
                        <div class="card-body">
                            <i class="bi bi-pencil-square fs-1 text-warning"></i>
                            <h5 class="card-title mt-3">Actualización de Datos</h5>
                            <p class="card-text">Actualiza la información de tus propiedades.</p>
                            <a href="datos.php" class="btn btn-outline-warning">Actualizar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-custom h-100 text-center">
                        <div class="card-body">
                            <i class="bi bi-currency-dollar fs-1 text-success"></i>
                            <h5 class="card-title mt-3">Pago de Impuestos</h5>
                            <p class="card-text">Realiza el pago de tus impuestos prediales de manera fácil.</p>
                            <a href="#" class="btn btn-outline-success">Iniciar</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>


    <?php include "template/pie.php"; ?>