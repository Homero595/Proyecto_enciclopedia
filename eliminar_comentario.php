<?php
session_start();
include "conexion.php";

if (!isset($_SESSION["nombre_usuario"])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST["comentario_id"])) {
    $comentario_id = (int)$_POST["comentario_id"];

    // Primero verificamos si el comentario le pertenece al usuario
    $stmt = $conexion->prepare("SELECT nombre_usuario FROM comentarios WHERE id = ?");
    $stmt->bind_param("i", $comentario_id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $comentario = $resultado->fetch_assoc();

        if ($comentario["nombre_usuario"] === $_SESSION["nombre_usuario"]) {
            // Eliminar el comentario y sus respuestas
            $stmt = $conexion->prepare("DELETE FROM comentarios WHERE id = ? OR respuesta_a = ?");
            $stmt->bind_param("ii", $comentario_id, $comentario_id);
            $stmt->execute();
        }
    }
}

header("Location: index.php");
exit();
?>
