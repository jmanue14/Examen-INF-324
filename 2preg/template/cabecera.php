<?php
session_start();

echo $_SESSION['nombre_cuenta']."holasss";
echo $_SESSION['id_persona']."holasss";

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

<body>
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
            <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="agregar_persona.php">Agregar Personas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="datos.php">Propiedades</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tramites.php">Tramites</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="logout.php">Cerrar Sesión</a>
            <!-- Aquí agregamos el botón de cerrar sesión -->
             <?php echo $_SESSION['nombre_cuenta']."holasss";?>
          </li>
        </ul>
      </div>
    </div>
  </nav>