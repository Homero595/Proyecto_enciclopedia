<?php 
$servername = 
$username = 
$password = 
$dbname = 

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
    <title>Salvadores</title>
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

        .container.rion {
            background: linear-gradient(135deg, #4c2a57, #7a4f91);
            color: #f1e4ff;
            border-left: 10px solid #c084fc;
            box-shadow: 0 0 25px rgba(192, 132, 252, 0.4);
        }

        .container.spark {
            background: linear-gradient(135deg, #2d3e50, #3f6a89);
            color: #d0ecff;
            border-left: 10px solid #66ccff;
            box-shadow: 0 0 25px rgba(102, 204, 255, 0.4);
        }

        .character-img {
            flex: 1 1 300px;
        }

        .character-img img {
            width: 100%;
            max-width: 350px;
            height: auto;
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

        .description {
            text-align: justify;
            line-height: 1.6;
            color: inherit;
        }

        .container h2 {
            color: inherit;
        }
    </style>
</head>
<body>

    <div class="top-bar">
        <a href="index.php">Volver al inicio</a>
    </div>

    <h1>Salvadores</h1>
    <p style="text-align: justify; max-width: 1000px; margin: 0 auto 40px auto; line-height: 1.8;">
        el espacio ocupado por humanos está lleno de todas las ocupaciones concebibles conocidas por la humanidad, pero pocas son más oportunistas y duplicitas que la del salvador. sin embargo, incluso entre su especie, a menudo se puede encontrar valentía sacrificial y lealtad inquebrantable, como fue el caso de rion forge y la tripulación de las de espadas.
    </p>

    <?php
    // Personajes humanos
    $sql = "SELECT * FROM personajes WHERE categoria = 'salvadores'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $nombre = strtolower($row["nombre"]);
            $clase_personalizada = 'default';

            if (strpos($nombre, 'rion') !== false) {
                $clase_personalizada = 'rion';
            }

            echo "<div class='container $clase_personalizada'>"; 
                echo "<div class='character-img'>";
                    echo "<img src='" . htmlspecialchars($row["imagen"]) . "' alt='Imagen de " . htmlspecialchars($row["nombre"]) . "'>";
                echo "</div>";
                echo "<div class='character-info'>";
                    echo "<h2>" . htmlspecialchars($row["nombre"]) . "</h2>";
                    echo "<div class='info-grid'>";
                        echo "<div><strong>Número de Servicio:</strong> " . htmlspecialchars($row["numero_servicio"]) . "</div>";
                        echo "<div><strong>Rango:</strong> " . htmlspecialchars($row["rango"]) . "</div>";
                        echo "<div><strong>Altura:</strong> " . htmlspecialchars($row["altura"]) . " cm</div>";
                        echo "<div><strong>Peso:</strong> " . htmlspecialchars($row["peso"]) . " kg</div>";
                        echo "<div><strong>Mundo de Nacimiento:</strong> " . htmlspecialchars($row["mundo_nacimiento"]) . "</div>";
                        echo "<div><strong>Fecha de Nacimiento:</strong> " . htmlspecialchars($row["fecha_nacimiento"]) . "</div>";
                    echo "</div>";
                    echo "<p class='description'>" . nl2br(htmlspecialchars($row["descripcion"])) . "</p>";
                echo "</div>";
            echo "</div>";
        }
    }

    // Inteligencias artificiales
    $sql_ia = "SELECT * FROM InteligenciasArtificiales WHERE categoria = 'salvadores'";
    $resultado_ia = $conn->query($sql_ia);

    if ($resultado_ia->num_rows > 0) {
        while ($row = $resultado_ia->fetch_assoc()) {
            $nombre = strtolower($row["nombre"]);
            $clase_personalizada = 'spark';

            echo "<div class='container $clase_personalizada'>";
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
