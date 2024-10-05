<?php
session_start();
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_cuenta = $_POST['nombre_cuenta'];
    $ci = $_POST['ci'];

    // Usando sentencias preparadas para evitar SQL Injection
    $stmt = $con->prepare("SELECT p.ci, p.nombre, p.apellido, c.nombre_cuenta, p.id_persona, c.rol
                           FROM persona p 
                           JOIN cuenta c ON p.id_cuenta = c.id_cuenta 
                           WHERE c.nombre_cuenta = ?");
    $stmt->bind_param("s", $nombre_cuenta);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        if ($ci === $usuario['ci']) {
            $_SESSION['nombre_cuenta'] = $usuario['nombre_cuenta'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['apellido'] = $usuario['apellido'];
            $_SESSION['id_persona'] = $usuario['id_persona'];
            $_SESSION['rol'] = $usuario['rol'];

            // Redirigir basado en el rol
            if (isset($_SESSION['rol'])) {
                switch ($_SESSION['rol']) {
                    case 'funcionario':
                        header('Location: inicio.php');
                        exit();
                    case 'usuario':
                        header('Location: pagina_usuario.php');
                        exit();
                    
                }
            }
        } else {
            $error = "CI incorrecto.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        .login-title {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h3 class="login-title">Iniciar Sesión</h3>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="nombre_cuenta" class="form-label">Nombre de Cuenta</label>
                <input type="text" class="form-control" id="nombre_cuenta" name="nombre_cuenta" required placeholder="Ingrese su cuenta">
            </div>
            <div class="mb-3">
                <label for="ci" class="form-label">CI</label>
                <input type="password" class="form-control" id="ci" name="ci" required placeholder="Ingrese su CI">
            </div>
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
