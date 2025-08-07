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
    <title>Spirit of Fire</title>
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

        .container.cutter {
            background: linear-gradient(135deg, #2e3b4e, #455a64);
            color: #e0f7fa;
            border-left: 10px solid #4fc3f7;
            box-shadow: 0 0 25px rgba(79, 195, 247, 0.4);
        }

        .container.anders {
            background: linear-gradient(135deg, #3a2640, #5b3d68);
            color: #f0e6ff;
            border-left: 10px solid #ba68c8;
            box-shadow: 0 0 25px rgba(186, 104, 200, 0.4);
        }

        .container.forge {
            background: linear-gradient(135deg, #402d22, #6a4c3b);
            color: #ffe0b2;
            border-left: 10px solid #ff7043;
            box-shadow: 0 0 25px rgba(255, 112, 67, 0.4);
        }

        .container.jerome {
            background: linear-gradient(135deg, #1e3a2c, #336b48);
            color: #d0f8ce;
            border-left: 10px solid #66bb6a;
            box-shadow: 0 0 25px rgba(102, 187, 106, 0.4);
        }

        .container.isabel {
            background: linear-gradient(135deg, #4a351f, #7a4a1e);
            color: #fff3e0;
            border-left: 10px solid #ff9800;
            box-shadow: 0 0 25px rgba(255, 152, 0, 0.4);
        }

        .container.ia {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: #dcefff;
            border-left: 10px solid #42a5f5;
            box-shadow: 0 0 25px rgba(66, 165, 245, 0.4);
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

    <h1>Spirit of Fire</h1>
    <p style="text-align: justify; max-width: 1000px; margin: 0 auto 40px auto; line-height: 1.8;">
        La tripulación de la nave **Spirit of Fire** fue parte fundamental en la lucha contra el Covenant, enfrentando amenazas desconocidas en la galaxia. A bordo, un grupo selecto de soldados, científicos e inteligencias artificiales demostraron que el sacrificio y el deber siguen guiando a la humanidad incluso en los rincones más oscuros del universo.
    </p>

    <?php
    // PERSONAJES HUMANOS
    $sql = "SELECT * FROM personajes WHERE categoria = 'Spirit of fire'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $nombre = strtolower($row["nombre"]);
            $clase = "container";

            if (strpos($nombre, 'cutter') !== false) {
                $clase .= " cutter";
            } elseif (strpos($nombre, 'anders') !== false) {
                $clase .= " anders";
            } elseif (strpos($nombre, 'forge') !== false) {
                $clase .= " forge";
            } elseif (strpos($nombre, 'jerome') !== false) {
                $clase .= " jerome";
            }

            echo "<div class='$clase'>";
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

    // INTELIGENCIAS ARTIFICIALES
    $sqlIA = "SELECT * FROM InteligenciasArtificiales WHERE categoria = 'Spirit of fire'";
    $resultadoIA = $conn->query($sqlIA);

    if ($resultadoIA->num_rows > 0) {
        while ($row = $resultadoIA->fetch_assoc()) {
            $nombreIA = strtolower($row["nombre"]);
            $clase = "container ia";

            if (strpos($nombreIA, 'isabel') !== false) {
                $clase = "container isabel";
            }

            echo "<div class='$clase'>";
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