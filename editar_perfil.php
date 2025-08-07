<?php
// Iniciar la sesión para acceder a las variables de sesión
session_start();

// Variable para almacenar mensajes de éxito o error
$mensaje = "";

// Verificar si el usuario está logueado (si no hay ID en sesión, redirigir al login)
if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit();
}

// Guardar el ID del usuario actual desde la sesión
$id_usuario = $_SESSION["id_usuario"];

// Verificar si el formulario fue enviado (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nuevo nombre desde el formulario
    $nuevo_nombre = $_POST["nombre_usuario"];

    // Obtener el nombre y ruta temporal de la nueva imagen (si se cargó)
    $nueva_imagen = $_FILES["imagen"]["name"];
    $imagen_tmp = $_FILES["imagen"]["tmp_name"];

    // Carpeta donde se almacenan las imágenes de perfil
    $carpeta_destino = "imagenes_perfil/";

    // Crear la carpeta si no existe
    if (!file_exists($carpeta_destino)) {
        mkdir($carpeta_destino, 0777, true);
    }

    // Inicializar la ruta final vacía
    $ruta_final = "";

    // Si se cargó una imagen, moverla a la carpeta final
    if (!empty($nueva_imagen)) {
        $ruta_final = $carpeta_destino . basename($nueva_imagen);
        move_uploaded_file($imagen_tmp, $ruta_final);
    }

    // Conectarse a la base de datos
    $conexion = new mysqli("", "", "", "");

    // Verificar si hubo error al conectar
    if ($conexion->connect_error) {
        $mensaje = "Error de conexión: " . $conexion->connect_error;
    } else {
        // Si se subió una imagen nueva, actualizar también el campo de imagen
        if (!empty($ruta_final)) {
            $stmt = $conexion->prepare("UPDATE usuario SET nombre_usuario = ?, imagen_perfil = ? WHERE id = ?");
            $stmt->bind_param("ssi", $nuevo_nombre, $ruta_final, $id_usuario);

            // Actualizar la imagen en la sesión
            $_SESSION["imagen_perfil"] = $ruta_final;
        } else {
            // Solo actualizar el nombre si no se subió imagen
            $stmt = $conexion->prepare("UPDATE usuario SET nombre_usuario = ? WHERE id = ?");
            $stmt->bind_param("si", $nuevo_nombre, $id_usuario);
        }

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Si fue exitoso, actualizar el nombre en la sesión también
            $_SESSION["nombre_usuario"] = $nuevo_nombre;
            $mensaje = "Perfil actualizado correctamente.";
        } else {
            // Si falló, mostrar mensaje de error
            $mensaje = "Error al actualizar el perfil: " . $stmt->error;
        }

        // Cerrar la consulta y la conexión
        $stmt->close();
        $conexion->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>

    <!-- Fuente personalizada Orbitron desde Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">

    <!-- Estilos CSS embebidos -->
    <style>
        body {
            font-family: 'Orbitron', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(rgba(0,0,0,0.95), rgba(0,0,0,0.95)),
                        url('https://i.pinimg.com/originals/d8/fc/57/d8fc573fc2dfd2ac7a80fc105ce08a15.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            text-shadow: 0 0 10px #00faff;
        }

        form {
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            max-width: 400px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.3);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #00faff;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            background: #1c1c1c;
            border: 1px solid #00faff;
            border-radius: 5px;
            color: white;
        }

        input[type="submit"] {
            background-color: #00faff;
            border: none;
            color: #000;
            padding: 10px;
            width: 100%;
            margin-top: 20px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #00d4d4;
        }

        .mensaje {
            text-align: center;
            margin-top: 20px;
            color: #0f0;
        }

        .boton {
            display: inline-block;
            margin-top: 15px;
            background-color: #00faff;
            color: black;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 0 10px #00faff;
            transition: 0.3s;
        }

        .boton:hover {
            background-color: #00d4d4;
        }
    </style>
</head>
<body>

    <!-- Título de la sección -->
    <h2>Editar Perfil Spartan</h2>

    <!-- Formulario para actualizar nombre e imagen de perfil -->
    <form action="editar_perfil.php" method="POST" enctype="multipart/form-data">
        <!-- Campo para el nuevo nombre de usuario -->
        <label for="nombre_usuario">Nuevo Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" id="nombre_usuario"
               value="<?= htmlspecialchars($_SESSION["nombre_usuario"]) ?>" required>

        <!-- Campo para cargar nueva imagen de perfil -->
        <label for="imagen">Nueva Imagen de Perfil (opcional):</label>
        <input type="file" name="imagen" id="imagen" accept="image/*">

        <!-- Botón para guardar los cambios -->
        <input type="submit" value="Guardar Cambios">

        <!-- Botón para volver al inicio -->
        <div style="text-align:center; margin-top: 20px;">
            <a class="boton" href="index.php">Ir al inicio</a>
        </div>
    </form>

    <!-- Mostrar mensaje de éxito o error -->
    <div class="mensaje"><?= htmlspecialchars($mensaje) ?></div>

</body>
</html>