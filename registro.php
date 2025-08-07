<?php
// Variable para mostrar mensajes de éxito o error
$mensaje = "";

// Verifica si el formulario fue enviado por método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre_usuario = $_POST["nombre_usuario"];
    $correo = $_POST["correo"];
    $contrasena_original = $_POST["contrasena"];
    $imagen_nombre = $_FILES["imagen"]["name"];
    $imagen_tmp = $_FILES["imagen"]["tmp_name"];
    $carpeta_destino = "imagenes_perfil/"; // Carpeta donde se guardará la imagen

    // Validar que la contraseña no sea demasiado larga
    if (strlen($contrasena_original) > 20) {
        $mensaje = "La contraseña no debe superar los 20 caracteres.";
    }
    // Validar fuerza de contraseña (minúscula, mayúscula y carácter especial)
    elseif (!preg_match('/[a-z]/', $contrasena_original) || !preg_match('/[A-Z]/', $contrasena_original) || !preg_match('/[^a-zA-Z0-9]/', $contrasena_original)) {
        $mensaje = "La contraseña debe tener al menos una minúscula, una mayúscula y un carácter especial.";
    }
    else {
        // Si la carpeta no existe, se crea
        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true);
        }

        // Define la ruta final del archivo a guardar
        $ruta_final = $carpeta_destino . basename($imagen_nombre);

        // Mueve la imagen del temporal a la carpeta final
        if (move_uploaded_file($imagen_tmp, $ruta_final)) {
            // Conexión a la base de datos
            $conexion = new mysqli("", "", "", "");

            // Verifica la conexión
            if ($conexion->connect_error) {
                $mensaje = "Error de conexión: " . $conexion->connect_error;
            } else {
                // Verifica que el correo no esté ya registrado
                $verificar_correo = $conexion->prepare("SELECT id FROM usuario WHERE correo = ?");
                $verificar_correo->bind_param("s", $correo);
                $verificar_correo->execute();
                $verificar_correo->store_result();

                if ($verificar_correo->num_rows > 0) {
                    // Si ya existe el correo
                    $mensaje = "Este correo ya está registrado.";
                } else {
                    // Hashea la contraseña antes de almacenarla
                    $contrasena = password_hash($contrasena_original, PASSWORD_DEFAULT);

                    // Inserta los datos en la tabla usuario
                    $stmt = $conexion->prepare("INSERT INTO usuario (nombre_usuario, correo, contrasena, imagen_perfil) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $nombre_usuario, $correo, $contrasena, $ruta_final);

                    // Verifica si se insertó correctamente
                    if ($stmt->execute()) {
                        $mensaje = "¡Spartan registrado exitosamente!";
                    } else {
                        $mensaje = "Error al registrar: " . $stmt->error;
                    }

                    $stmt->close(); // Cierra el statement
                }

                $verificar_correo->close(); // Cierra la verificación de correo
                $conexion->close(); // Cierra la conexión
            }
        } else {
            // Si la imagen no se pudo subir
            $mensaje = "Error al subir la imagen.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Spartan</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Orbitron', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.9)),
                        url('https://es.gamewallpapers.com/img_script/wallpaper_dir/img.php?src=wallpaper_halo_infinite_32_2560x1080.jpg&height=506&sharpen') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            text-shadow: 0 0 10px #00faff;
        }

        form {
            background: rgba(0, 0, 0, 0.7);
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
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            background: #1c1c1c;
            border: 1px solid #00faff;
            border-radius: 5px;
            color: white;
        }

        .boton {
            display: inline-block;
            width: 100%;
            margin-top: 30px;
            background-color: #00faff;
            color: black;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 0 10px #00faff;
            transition: 0.3s;
            font-family: 'Orbitron', sans-serif;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .boton:hover {
            background-color: #00d4d4;
        }

        .mensaje {
            text-align: center;
            margin-top: 30px;
            color: #0f0;
        }
    </style>
</head>
<body>

    <h2>Registro Spartan</h2>

    <form action="registro.php" method="POST" enctype="multipart/form-data">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" id="nombre_usuario" required>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required maxlength="20">

        <label for="imagen">Imagen de Perfil:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*" required>

        <input type="submit" class="boton" value="Registrar Spartan">
        <a href="index.php" class="boton">Ir al inicio</a>
    </form>

    <div class="mensaje"><?= htmlspecialchars($mensaje) ?></div>

</body>
</html>