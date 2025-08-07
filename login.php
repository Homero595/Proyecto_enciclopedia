<?php
// Inicia la sesión para poder usar variables de sesión
session_start();
// Variable para almacenar mensajes de error
$mensaje = "";

// Verifica si el formulario fue enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el correo y la contraseña enviados por el formulario
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

     // Crea una conexión a la base de datos
    $conexion = new mysqli("", "", "", "");

    // Verifica si hubo un error al conectar con la base de datos
    if ($conexion->connect_error) {
        $mensaje = "Error de conexión: " . $conexion->connect_error;
    } else {
        // Prepara una consulta SQL para buscar al usuario por su correo
        $stmt = $conexion->prepare("SELECT id, nombre_usuario, contrasena, imagen_perfil FROM usuario WHERE correo = ?");
        $stmt->bind_param("s", $correo);  // Enlaza el parámetro (correo)
        $stmt->execute();  // Enlaza el parámetro (correo)
        $resultado = $stmt->get_result(); // Obtiene el resultado

        // Verifica si se encontró exactamente un usuario
        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc(); // Obtiene los datos del usuario

            if (password_verify($contrasena, $usuario["contrasena"])) {
                // Guarda información del usuario en la sesión
                $_SESSION["id_usuario"] = $usuario["id"];
                $_SESSION["nombre_usuario"] = $usuario["nombre_usuario"];
                $_SESSION["imagen_perfil"] = $usuario["imagen_perfil"];

                // Redirige al perfil del usuario
                header("Location: perfil.php");
                exit();
            } else {
                $mensaje = "Contraseña incorrecta.";
            }
        } else {
            $mensaje = "No se encontró una cuenta con ese correo.";
        }

        // Cierra la consulta y la conexión
        $stmt->close();
        $conexion->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Orbitron', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.9)),
                        url('https://www.xtrafondos.com/wallpapers/halo-infinite-master-chief-9445.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }
        form {
            background: rgba(0, 0, 0, 0.75);
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
        input[type="email"],
        input[type="password"] {
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
            color: #f55;
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
    <h2 style="text-align:center; text-shadow: 0 0 10px #00faff;">Inicio de Sesión Spartan</h2>

    <form action="login.php" method="POST">
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required>

        <input type="submit" value="Iniciar Sesión">

        <div style="text-align:center">
            <a class="boton" href="index.php">Ir al inicio</a>
        </div>
    </form>

    <div class="mensaje"><?= htmlspecialchars($mensaje) ?></div>
</body>
</html>