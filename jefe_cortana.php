<?php
// Conexión a la base de datos en InfinityFree
$servername = "sql206.infinityfree.com";
$username = "if0_38917772";
$password = "Amu7w6UeR7MlN";
$dbname = "if0_38917772_db_unsc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta de Jefe Maestro
$sql = "SELECT * FROM personajes WHERE categoria = 'Jefe Maestro y Cortana'";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Jefe Maestro y Cortana</title>
</head>
<body>
    <h1>Jefe Maestro y Cortana</h1>
    <a href="index.html">Volver al inicio</a>
    <hr>

    <?php
    // Mostrar personajes
    if ($resultado->num_rows > 0) {

        while ($row = $resultado->fetch_assoc()) {
            echo "<h2>" . htmlspecialchars($row["nombre"]) . "</h2>";
            echo "<p><strong>Número de Servicio:</strong> " . htmlspecialchars($row["numero_servicio"]) . "</p>";
            echo "<p><strong>Altura:</strong> " . htmlspecialchars($row["altura"]) . " m</p>";
            echo "<p><strong>Peso:</strong> " . htmlspecialchars($row["peso"]) . " kg</p>";
            echo "<p><strong>Mundo de Nacimiento:</strong> " . htmlspecialchars($row["mundo_nacimiento"]) . "</p>";
            echo "<p><strong>Rango:</strong> " . htmlspecialchars($row["rango"]) . "</p>";
            echo "<p><strong>Fecha de Nacimiento:</strong> " . htmlspecialchars($row["fecha_nacimiento"]) . "</p>";
            echo "<p><strong>Descripción:</strong> " . htmlspecialchars($row["descripcion"]) . "</p>";
            echo "<img src='" . htmlspecialchars($row["imagen"]) . "' alt='Imagen de " . htmlspecialchars($row["nombre"]) . "' width='200'><hr>";
        }
    } else {
        echo "<p>No se encontraron personajes.</p>";
    }

    // Consulta para Cortana
    $sqlCortana = "SELECT * FROM Cortana WHERE categoria = 'Jefe Maestro y Cortana'";
    $resultadoCortana = $conn->query($sqlCortana);

    // Mostrar a Cortana
    if ($resultadoCortana->num_rows > 0) {
        echo "<h2>Información de Cortana</h2>";
        while ($row = $resultadoCortana->fetch_assoc()) {
            echo "<h3>" . htmlspecialchars($row["nombre"]) . "</h3>";
            echo "<p><strong>Número de Servicio:</strong> " . htmlspecialchars($row["numero_servicio"]) . "</p>";
            echo "<p><strong>Función Principal:</strong> " . htmlspecialchars($row["funcion_principal"]) . "</p>";
            echo "<p><strong>Sitio de Activación:</strong> " . htmlspecialchars($row["sitio_activacion"]) . "</p>";
            echo "<p><strong>Fecha de Activación:</strong> " . htmlspecialchars($row["fecha_activacion"]) . "</p>";
            echo "<p><strong>Descripción:</strong> " . htmlspecialchars($row["descripcion"]) . "</p>";
            echo "<img src='" . htmlspecialchars($row["imagen"]) . "' alt='Imagen de " . htmlspecialchars($row["nombre"]) . "' width='200'><hr>";
        }
    } else {
        echo "<p>No se encontró información de Cortana.</p>";
    }

    $conn->close();
    ?>
</body>
</html>