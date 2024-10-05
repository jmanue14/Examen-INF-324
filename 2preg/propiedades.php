<?php
session_start();

echo $_SESSION['nombre_cuenta'] . "holasss";
echo $_SESSION['id_persona'] . "holasss";

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAM-LP Catastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Estilos personalizados */
        .navbar-custom {
            background-color: #343a40;
            padding: 1rem 2rem;
        }

        .hero-section {
            background-image: url('fondo-catastro.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 150px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 4rem;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        .btn-custom {
            background-color: #ff6f61;
            color: white;
            padding: 10px 20px;
        }

        .card-custom {
            transition: transform 0.3s ease;
        }

        .card-custom:hover {
            transform: scale(1.05);
        }

        .footer-custom {
            background-color: #2b2b2b;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .footer-custom a {
            color: #ff6f61;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer-custom a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Menú de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
                <img src="img/logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                HAM-LP Catastro
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pagina_usuario.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="propiedades.php">Propiedades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tramites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Cerrar Sesión</a>
                        <!-- Aquí agregamos el botón de cerrar sesión -->
                        <?php echo $_SESSION['nombre_cuenta'] . "holasss"; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    include "conexion.php";


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
                        
                    </tr>
                <?php } ?>
            </tbody>
            
        </table>
    </div>




    <!-- Pie de página -->
    <footer class="mt-auto bg-dark text-white text-center py-3">
        <div class="container">
            <p>© 2024 HAM-LP Catastro. Todos los derechos reservados.</p>
            <p>
                <a href="#">Facebook</a> |
                <a href="#">Twitter</a> |
                <a href="#">Instagram</a>
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>