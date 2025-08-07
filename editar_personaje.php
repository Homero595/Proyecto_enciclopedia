<?php
// Iniciar sesión para acceder a variables de sesión
session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit();
}
// Conectar con la base de datos
$conexion = new mysqli("", "", "", "");
// Verificar si hubo error de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
// Obtener el ID del personaje desde la URL (método GET)
$id_personaje = $_GET["id_personaje"] ?? null;
// Si no se proporciona un ID válido, mostrar error y detener
if (!$id_personaje) {
    echo "ID no válido.";
    exit();
}
// Si el formulario fue enviado (método POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos enviados desde el formulario
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    // Verificar si se subió una imagen nueva
    if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
         // Obtener el nombre y ruta de destino de la imagen
        $nombreImagen = basename($_FILES["imagen"]["name"]);
        $rutaDestino = "imagenes_comunidad/" . $nombreImagen;

        // Mover la imagen al directorio de destino
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaDestino)) {
            $imagen_url = $rutaDestino;
        } else {
            echo "<div class='mensaje-error'>Error al subir la imagen.</div>";
            exit();
        }
    } else {
        // Si no se subió imagen nueva, conservar la actual
        $imagen_url = $_POST["imagen_actual"]; // mantener la imagen actual si no se subió nueva
    }

    // Preparar la sentencia SQL para actualizar el personaje
    $stmt = $conexion->prepare("UPDATE personajescomunidad SET nombre=?, descripcion=?, imagen_url=? WHERE id_personaje=? AND id_usuario=?");
    $stmt->bind_param("sssii", $nombre, $descripcion, $imagen_url, $id_personaje, $_SESSION["id_usuario"]);
    $stmt->execute();

    // Verificar si se actualizó correctamente
        if ($stmt->affected_rows > 0) {
        // Redirigir a la lista de personajes si fue exitoso
        header("Location: personajes_comunidad.php");
        exit();
    } else {
        // Mostrar error si no fue posible actualizar (por permisos u otro motivo)
        echo "<div class='mensaje-error'>No se pudo actualizar (quizás no eres el dueño del personaje).</div>";
    }

    // Cerrar la consulta preparada
    $stmt->close();
} else {
    $stmt = $conexion->prepare("SELECT * FROM personajescomunidad WHERE id_personaje=? AND id_usuario=?");
    $stmt->bind_param("ii", $id_personaje, $_SESSION["id_usuario"]);
    $stmt->execute();
    $resultado = $stmt->get_result();
    // Verificar que el personaje exista y pertenezca al usuario
    if ($resultado->num_rows === 0) {
        echo "<div class='mensaje-error'>No tienes permiso para editar este personaje.</div>";
        exit();
    }
    // Obtener los datos del personaje en un arreglo asociativo
    $personaje = $resultado->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Personaje</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e1e2f;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
        }

        h2 {
            color: #00ffff;
            margin-bottom: 20px;
        }

        form {
            background-color: #2d2d44;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #00ffff55;
            width: 100%;
            max-width: 500px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-top: 5px;
            background-color: #44445a;
            color: white;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            margin-top: 20px;
            background-color: #00bcd4;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #0097a7;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: #ccc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .mensaje-error {
            background-color: #ff5252;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            color: white;
        }

        .imagen-actual {
            margin-top: 10px;
        }

        .imagen-actual img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 8px;
            box-shadow: 0 0 8px #00ffff55;
        }
    </style>
</head>
<body>

     <!-- Título de la página -->
    <h2>Editar Personaje</h2>

    <!-- Formulario para editar los datos del personaje -->
    <form method="POST" enctype="multipart/form-data">
        <!-- Campo para el nombre -->
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($personaje["nombre"]) ?>" required>

        <!-- Campo para la descripción -->
        <label>Descripción:</label>
        <textarea name="descripcion" required><?= htmlspecialchars($personaje["descripcion"]) ?></textarea>

        <!-- Imagen actual del personaje -->
        <label>Imagen actual:</label>
        <div class="imagen-actual">
            <img src="<?= htmlspecialchars($personaje["imagen_url"]) ?>" alt="Imagen actual">
        </div>

        <!-- Campo para cambiar la imagen -->
        <label>Cambiar imagen:</label>
        <input type="file" name="imagen" accept="image/*">

        <!-- Campo oculto para conservar la imagen si no se actualiza -->
        <input type="hidden" name="imagen_actual" value="<?= htmlspecialchars($personaje["imagen_url"]) ?>">

        <!-- Botón para enviar el formulario -->
        <button type="submit">Actualizar</button>
    </form>

    <!-- Enlace para volver a la lista de personajes -->
    <a href="personajes_comunidad.php">← Volver</a>

</body>
</html>