<?php
// Inicia la sesión para acceder a las variables de sesión
session_start();

// Verifica si el usuario ha iniciado sesión, si no, redirige a login.php
if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit();
}

// Establece la conexión con la base de datos
$conexion = new mysqli(
    "",          // Servidor
    "",                     // Usuario de la base de datos
    "",                    // Contraseña
    ""             // Nombre de la base de datos
);

// Verifica si ocurrió un error al conectar con la base de datos
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtiene el ID del personaje desde la URL (método GET)
$id_personaje = $_GET["id_personaje"] ?? null;

// Si se recibió un ID de personaje
if ($id_personaje) {
    // Prepara una consulta SQL para eliminar el personaje solo si pertenece al usuario actual
    $stmt = $conexion->prepare("DELETE FROM personajescomunidad WHERE id_personaje=? AND id_usuario=?");
    $stmt->bind_param("ii", $id_personaje, $_SESSION["id_usuario"]);
    
    // Ejecuta la consulta
    $stmt->execute();

    // Verifica si se eliminó algún registro (es decir, si el usuario tenía permiso)
    if ($stmt->affected_rows > 0) {
        echo "Personaje eliminado correctamente.";
    } else {
        echo "No tienes permiso para eliminar este personaje.";
    }

    // Cierra la consulta preparada
    $stmt->close();
}

// Redirige de vuelta a la página de personajes de la comunidad
header("Location: personajes_comunidad.php");
exit();
?>