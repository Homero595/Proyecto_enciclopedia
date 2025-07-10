<?php 
$servername = "----";
$username = "-------";
$password = "------";
$dbname = "-------";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Jefe Maestro y Cortana</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Orbitron', Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.9)),
                        url('https://wallpapercave.com/wp/wp2797149.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        h1 {
            text-align: center;
            color: #ffffff;
            margin-top: 10px;
            text-shadow: 1px 1px 6px #000;
        }

        .top-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .top-bar a {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .top-bar a:hover {
            background-color: #0056b3;
        }

        .container {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 40px;
            padding: 40px;
            border-radius: 10px;
            margin-bottom: 40px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);           
        }

        .container:hover {
            
            box-shadow: 0 0 35px rgba(255, 255, 255, 0.2);
        }
        .container.jefe {
            background: linear-gradient(135deg, #2c2c2c, #505050);
            color: #f5f5f5;
            border-left: 10px solid #00ff00;
            box-shadow: 0 0 25px rgba(0, 255, 50, 0.3);
        }

        .container.cortana {
            background: linear-gradient(135deg, #1f2f45, #3a4c6b);
            color: #e0f0ff;
            border-left: 10px solid #00bfff;
            box-shadow: 0 0 25px rgba(0, 183, 255, 0.4);
        }

        .character-img {
            flex: 1 1 300px;
        }

        .character-img img {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.6);
        }

        .character-info {
            flex: 2 1 500px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px 20px;
            margin: 20px 0;
        }

        .info-grid div {
            background: rgba(255, 255, 255, 0.05);
            padding: 10px;
            border-radius: 5px;
            font-size: 0.95em;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .container.jefe .info-grid div {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .container.cortana .info-grid div {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .description {
            text-align: justify;
            line-height: 1.6;
        }

        .container.cortana .description {
            color: #c8e9ff;
        }

        .container.jefe .description {
            color: #d4ffd4;
        }

        .container.jefe h2 {
            color: #8fff8f;
        }

        .container.cortana h2 {
            color: #aeefff;
        }
    </style>
</head>
<body>

    <div class="top-bar">
        <a href="index.php">Volver al inicio</a>
    </div>

<h1>Jefe Maestro y Cortana</h1>
<p style="text-align: justify; max-width: 1000px; margin: 0 auto 40px auto; line-height: 1.8;">
    Mientras la humanidad se encontraba al borde de la extinción, la Dra. Catherine Halsey culminó décadas de planificación y preparación, fusionando lo mejor del programa de súper soldados Spartan-II con la inteligencia artificial más poderosa de su tipo, forjando lo que se convertiría en la última esperanza de la humanidad.
</p>
    <?php
    // Jefe Maestro
    $sql = "SELECT * FROM personajes WHERE categoria = 'Jefe Maestro y Cortana'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            echo "<div class='container jefe'>";
                echo "<div class='character-img'>";
                    echo "<img src='" . htmlspecialchars($row["imagen"]) . "' alt='Imagen de " . htmlspecialchars($row["nombre"]) . "'>";
                echo "</div>";
                echo "<div class='character-info'>";
                    echo "<h2>" . htmlspecialchars($row["nombre"]) . "</h2>";
                    echo "<div class='info-grid'>";
                        echo "<div><strong>Número de Servicio:</strong> " . htmlspecialchars($row["numero_servicio"]) . "</div>";
                        echo "<div><strong>Rango:</strong> " . htmlspecialchars($row["rango"]) . "</div>";
                        echo "<div><strong>Altura:</strong> " . htmlspecialchars($row["altura"]) . " Cm</div>";
                        echo "<div><strong>Peso:</strong> " . htmlspecialchars($row["peso"]) . " kg</div>";
                        echo "<div><strong>Mundo de Nacimiento:</strong> " . htmlspecialchars($row["mundo_nacimiento"]) . "</div>";
                        echo "<div><strong>Fecha de Nacimiento:</strong> " . htmlspecialchars($row["fecha_nacimiento"]) . "</div>";
                    echo "</div>";
                    echo "<p class='description'>" . nl2br(htmlspecialchars($row["descripcion"])) . "</p>";
                echo "</div>";
            echo "</div>";
        }
    }

    // Cortana
    $sqlCortana = "SELECT * FROM InteligenciasArtificiales WHERE categoria = 'Jefe Maestro y Cortana'";
    $resultadoCortana = $conn->query($sqlCortana);

    if ($resultadoCortana->num_rows > 0) {
        while ($row = $resultadoCortana->fetch_assoc()) {
            echo "<div class='container cortana'>";
                echo "<div class='character-img'>";
                    echo "<img src='" . htmlspecialchars($row["imagen"]) . "' alt='Imagen de " . htmlspecialchars($row["nombre"]) . "'>";
                echo "</div>";
                echo "<div class='character-info'>";
                    echo "<h2>" . htmlspecialchars($row["nombre"]) . "</h2>";
                    echo "<div class='info-grid'>";
                        echo "<div><strong>Número de Servicio:</strong> " . htmlspecialchars($row["numero_servicio"]) . "</div>";
                        echo "<div><strong>Avatar:</strong> " . htmlspecialchars($row["avatar"]) . "</div>";
                        echo "<div><strong>Función Principal:</strong> " . htmlspecialchars($row["funcion_principal"]) . "</div>";
                        echo "<div><strong>Sitio de Activación:</strong> " . htmlspecialchars($row["sitio_activacion"]) . "</div>";
                        echo "<div><strong>Fecha de Activación:</strong> " . htmlspecialchars($row["fecha_activacion"]) . "</div>";
                    echo "</div>";
                    echo "<p class='description'>" . nl2br(htmlspecialchars($row["descripcion"])) . "</p>";
                echo "</div>";
            echo "</div>";
        }
    }

    $conn->close();
    ?>
</body>
</html>
