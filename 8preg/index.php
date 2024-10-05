<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola Mundo Evasivo</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            overflow: hidden; /* Evita el desplazamiento de la página */
        }
        .message {
            position: absolute;
            padding: 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 8px;
            font-size: 24px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div id="mensaje" class="message" style="left: 50%; top: 50%; transform: translate(-50%, -50%);"><?php echo "Hola Mundo" ;?></div>

    <script>
        const mensaje = document.getElementById('mensaje');
        let availableWidth = window.innerWidth - mensaje.offsetWidth;
        let availableHeight = window.innerHeight - mensaje.offsetHeight;

        function moveMessage(event) {
            // Calcular una nueva posición aleatoria que sea visible dentro de la ventana
            const newX = Math.random() * (availableWidth - 50);
            const newY = Math.random() * (availableHeight - 50);
            
            // Aplicar la nueva posición
            mensaje.style.left = newX + 'px';
            mensaje.style.top = newY + 'px';
        }

        function updateAvailableSpace() {
            availableWidth = window.innerWidth - mensaje.offsetWidth;
            availableHeight = window.innerHeight - mensaje.offsetHeight;
        }

        mensaje.addEventListener('mouseover', moveMessage);

        window.addEventListener('resize', updateAvailableSpace);
    </script>
</body>
</html>
