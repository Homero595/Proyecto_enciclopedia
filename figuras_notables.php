<?php
$conexion = new mysqli("sql206.infinityfree.com", "if0_38917772", "Amu7w6UeR7MlN", "if0_38917772_db_unsc");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM personajes WHERE categoria = 'Figuras notables'";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Figuras notables</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f0f0f0;
            text-align: center;
        }
        .personaje {
            background-color: white;
            border: 1px solid #ccc;
            margin: 15px auto;
            padding: 10px;
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
        }
        img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h1>Figuras notables</h1>
    <a href="index.php">Volver al inicio</a>

    <?php
    if ($resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
            echo "<div class='personaje'>";
            echo "<h2>" . htmlspecialchars($fila["nombre"]) . "</h2>";
            echo "<p>Número de servicio: " . htmlspecialchars($fila["numero_servicio"]) . "</p>";
            echo "<p>Peso: " . htmlspecialchars($fila["peso"]) . "</p>";
            echo "<p>Mundo de nacimiento: " . htmlspecialchars($fila["mundo_nacimiento"]) . "</p>";
            echo "<p>Rango: " . htmlspecialchars($fila["rango"]) . "</p>";
            echo "<p>Fecha de nacimiento: " . htmlspecialchars($fila["fecha_nacimiento"]) . "</p>";
            echo "<p>Descripción: " . nl2br(htmlspecialchars($fila["descripcion"])) . "</p>";
            echo "<img src='" . htmlspecialchars($fila["imagen"]) . "' alt='Imagen de " . htmlspecialchars($fila["nombre"]) . "'>";
            echo "</div>";
        }
    } else {
        echo "<p>No se encontraron personajes.</p>";
    }

    $conexion->close();
    ?>
</body>
</html>