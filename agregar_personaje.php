<?php
session_start(); // Inicia o reanuda la sesión actual para acceder a variables de sesión

// Verifica si la sesión contiene una variable llamada 'id_usuario'
if (!isset($_SESSION["id_usuario"])) {
    // Si el usuario no ha iniciado sesión, lo redirige a la página de login
    header("Location: login.php");
    exit(); // Detiene la ejecución del script después de redirigir
}

$mensaje = ""; // Variable que se usará para almacenar mensajes de éxito o error

// Verifica si el formulario ha sido enviado usando el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"]; // Recupera el nombre del personaje enviado desde el formulario
    $descripcion = $_POST["descripcion"]; // Recupera la descripción del personaje
    $id_usuario = $_SESSION["id_usuario"]; // Obtiene el ID del usuario desde la sesión
    $imagen_nombre = $_FILES["imagen"]["name"]; // Nombre del archivo de imagen subido
    $imagen_tmp = $_FILES["imagen"]["tmp_name"]; // Ruta temporal del archivo subido

    // Verifica si se seleccionó una imagen
    if (!empty($imagen_nombre)) {
        $carpeta_destino = "imagenes_personajes/"; // Carpeta donde se guardará la imagen

        // Si la carpeta no existe, la crea con permisos 0777
        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true); // true para crear subdirectorios si es necesario
        }

        // Ruta final donde se guardará la imagen
        $ruta_imagen = $carpeta_destino . basename($imagen_nombre);

        // Mueve la imagen desde la ruta temporal a la carpeta destino
        if (move_uploaded_file($imagen_tmp, $ruta_imagen)) {
            // Conexión a la base de datos
            $conexion = new mysqli(
                "sql206.infinityfree.com",     // Servidor
                "if0_38917772",                // Usuario de la base de datos
                "Amu7w6UeR7MlN",               // Contraseña del usuario
                "if0_38917772_db_unsc"         // Nombre de la base de datos
            );

            // Verifica si hubo error de conexión
            if ($conexion->connect_error) {
                $mensaje = "Error de conexión: " . $conexion->connect_error; // Guarda mensaje de error
            } else {
                // Prepara la consulta SQL para insertar un nuevo personaje
                $stmt = $conexion->prepare(
                    "INSERT INTO personajescomunidad (nombre, descripcion, imagen_url, id_usuario) VALUES (?, ?, ?, ?)"
                );

                // Asocia los parámetros con los valores que serán insertados
                $stmt->bind_param("sssi", $nombre, $descripcion, $ruta_imagen, $id_usuario);

                // Ejecuta la consulta
                if ($stmt->execute()) {
                    $mensaje = "Personaje agregado exitosamente."; // Mensaje de éxito
                } else {
                    $mensaje = "Error al agregar personaje."; // Mensaje de fallo
                }

                $stmt->close(); // Cierra el statement preparado
                $conexion->close(); // Cierra la conexión a la base de datos
            }
        } else {
            $mensaje = "Error al subir la imagen."; // Mensaje si no se pudo mover la imagen
        }
    } else {
        $mensaje = "Por favor selecciona una imagen."; // Mensaje si no se seleccionó ninguna imagen
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Codificación de caracteres -->
    <title>Agregar Personaje</title> <!-- Título de la pestaña del navegador -->

    <!-- Fuente desde Google Fonts para darle un estilo futurista -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">

    <!-- Estilos CSS directamente embebidos en el HTML -->
    <style>
        body {
            background: black; /* Fondo oscuro */
            color: white; /* Texto blanco */
            font-family: 'Orbitron', sans-serif; /* Fuente Orbitron */
            padding: 20px; /* Separación interna */
        }

        form {
            background-color: #111; /* Fondo del formulario */
            padding: 20px; /* Espacio interno */
            max-width: 500px; /* Ancho máximo */
            margin: auto; /* Centrado horizontal */
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 0 15px #00faff; /* Sombra de neón */
        }

        label {
            display: block; /* Ocupa toda la línea */
            margin-top: 15px; /* Espacio arriba de cada label */
            color: #00faff; /* Color cian brillante */
        }

        input, textarea {
            width: 100%; /* Ancho completo */
            padding: 10px; /* Relleno interno */
            background-color: #222; /* Fondo gris oscuro */
            border: 1px solid #00faff; /* Borde cian */
            color: white; /* Texto blanco */
            border-radius: 5px; /* Bordes redondeados */
        }

        input[type="submit"] {
            background-color: #00faff; /* Fondo del botón */
            color: black; /* Texto del botón */
            font-weight: bold; /* Negrita */
            cursor: pointer; /* Cursor tipo mano */
            margin-top: 20px; /* Espacio superior */
        }

        .mensaje {
            text-align: center; /* Centrar texto */
            margin-top: 20px; /* Espacio superior */
            color: #f55; /* Color rojo (para errores o notificaciones) */
        }

        a {
            color: #00faff; /* Enlaces en color cian */
            text-decoration: none; /* Sin subrayado */
        }
    </style>
</head>

<body>
    <!-- Título centrado -->
    <h2 style="text-align:center;">Agregar Personaje a la Comunidad</h2>

    <!-- Formulario para enviar datos del personaje -->
    <form action="agregar_personaje.php" method="POST" enctype="multipart/form-data">
        <!-- Campo para ingresar el nombre del personaje -->
        <label for="nombre">Nombre del personaje:</label>
        <input type="text" name="nombre" required>

        <!-- Campo para ingresar la descripción -->
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" rows="5" required></textarea>

        <!-- Campo para subir la imagen -->
        <label for="imagen">Selecciona una imagen:</label>
        <input type="file" name="imagen" accept="image/*" required>

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Agregar Personaje">
    </form>

    <!-- Muestra el mensaje generado en PHP -->
    <div class="mensaje"><?= htmlspecialchars($mensaje) ?></div>

    <!-- Enlace para volver a la página anterior -->
    <div style="text-align:center; margin-top:20px;">
        <a href="personajes_comunidad.php">← Volver a personajes comunidad</a>
    </div>
</body>
</html>
