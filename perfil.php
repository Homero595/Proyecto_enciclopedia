<?php
// Inicia la sesión para acceder a los datos del usuario
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION["id_usuario"])) {
    // Si no ha iniciado sesión, lo redirige a la página de login
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos con los datos del hosting de InfinityFree
$conexion = new mysqli(
    "",       // Servidor
    "",                  // Usuario de base de datos
    "",                 // Contraseña
    ""          // Nombre de la base de datos
);

// Verifica si hubo un error en la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtiene el ID del usuario desde la sesión
$id_usuario = $_SESSION["id_usuario"];

// Prepara y ejecuta la consulta para obtener los datos del usuario
$stmt = $conexion->prepare("SELECT nombre_usuario, correo, imagen_perfil FROM usuario WHERE id = ?");
$stmt->bind_param("i", $id_usuario);  // Enlaza el ID como entero
$stmt->execute();
$resultado = $stmt->get_result();

// Si se encontró el usuario, guarda sus datos en un arreglo
if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();
} else {
    // Si no se encuentra, muestra un mensaje y detiene la ejecución
    echo "Usuario no encontrado.";
    exit();
}

// Cierra la consulta y la conexión
$stmt->close();
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil Spartan</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.9)),
                        url('https://images8.alphacoders.com/131/1311914.png') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        .perfil-container {
            max-width: 500px;
            margin: 60px auto;
            background: rgba(0, 0, 0, 0.75);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.3);
            text-align: center;
        }

        img.perfil {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #00faff;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 10px;
            color: #00faff;
        }

        p {
            font-size: 16px;
        }

        .boton {
            display: inline-block;
            margin: 10px 10px 0 10px;
            background: #00faff;
            color: #000;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 0 10px #00faff;
        }

        .boton:hover {
            background: #00d4d4;
        }
    </style>
</head>

<body>
    <!-- Contenido del perfil del usuario -->
    <div class="perfil-container">
        <!-- Imagen de perfil del usuario (segura con htmlspecialchars) -->
        <img src="<?= htmlspecialchars($usuario['imagen_perfil']) ?>" alt="Imagen de perfil" class="perfil">

        <!-- Nombre del usuario -->
        <h2><?= htmlspecialchars($usuario['nombre_usuario']) ?></h2>

        <!-- Correo del usuario -->
        <p><strong>Correo:</strong> <?= htmlspecialchars($usuario['correo']) ?></p>

        <!-- Botones de navegación -->
        <a class="boton" href="editar_perfil.php">Editar Perfil</a>
        <a class="boton" href="index.php">Ir al inicio</a>
    </div>

</body>
</html>