<?php
// Iniciamos sesión para poder acceder a los datos del usuario
session_start();

// Incluimos el archivo que contiene la conexión a la base de datos
include "conexion.php";

// Verificamos si el usuario ha iniciado sesión
if (!isset($_SESSION["nombre_usuario"])) {
    // Si no ha iniciado sesión, lo redirigimos al formulario de login
    header("Location: login.php");
    exit();
}

// Obtenemos el contenido del comentario desde el formulario y eliminamos espacios en blanco
$comentario = trim($_POST["comentario"]);

// Obtenemos la categoría seleccionada por el usuario
$categoria = $_POST["categoria"];

// Verificamos si este comentario es una respuesta a otro comentario (por defecto, 0 si no lo es)
$respuesta_a = isset($_POST["respuesta_a"]) ? (int)$_POST["respuesta_a"] : 0;

// Verificamos que el comentario no esté vacío
if ($comentario !== "") {
    // Obtenemos el nombre de usuario e imagen de perfil desde la sesión
    $nombre = $_SESSION["nombre_usuario"];
    $imagen = $_SESSION["imagen_perfil"];

    // Preparamos una consulta para insertar el nuevo comentario en la base de datos
    $stmt = $conexion->prepare("
        INSERT INTO comentarios 
        (nombre_usuario, imagen_perfil, comentario, fecha, categoria, respuesta_a) 
        VALUES (?, ?, ?, NOW(), ?, ?)
    ");

    // Asociamos los valores a los parámetros de la consulta
    $stmt->bind_param("ssssi", $nombre, $imagen, $comentario, $categoria, $respuesta_a);

    // Ejecutamos la consulta
    $stmt->execute();
}

// Después de guardar el comentario, redirigimos al usuario a la página principal
header("Location: index.php");
exit();
?>