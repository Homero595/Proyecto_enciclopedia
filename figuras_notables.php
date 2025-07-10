<?php 
$servername = "----";
$username = "----";
$password = "----";
$dbname = "----";

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
    <title>Figuras Notables</title>
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

        .container.notable {
            background: linear-gradient(135deg, #1a1e25, #2f3b4b);
            color: #e8e8e8;
            border-left: 10px solid #ffc107;
            box-shadow: 0 0 25px rgba(255, 193, 7, 0.4);
        }
        .container.halsey {
            background: linear-gradient(135deg, #23274a, #403b6e);
            color: #dce8ff;
            border-left: 10px solid #6a5acd;
            box-shadow: 0 0 25px rgba(106, 90, 205, 0.4);
        }

        .container.miranda {
            background: linear-gradient(135deg, #3b4048, #5a6c78);
            color: #d0e5ef;
            border-left: 10px solid #7fb3d5;
            box-shadow: 0 0 25px rgba(127, 179, 213, 0.4);
        }

        .container.johnson {
            background: linear-gradient(135deg, #2f3d2f, #4c644c);
            color: #e4ffe1;
            border-left: 10px solid #a2d729;
            box-shadow: 0 0 25px rgba(162, 215, 41, 0.4);
        }

        .container.echo {
            background: linear-gradient(135deg, #4b2e1f, #5f4432);
            color: #ffe8d1;
            border-left: 10px solid #ff7043;
            box-shadow: 0 0 25px rgba(255, 112, 67, 0.4);
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

    <h1>Figuras Notables</h1>
    <p style="text-align: justify; max-width: 1000px; margin: 0 auto 40px auto; line-height: 1.8;">
        El siglo 26 vio a la humanidad enfrentarse a una profunda adversidad como especie, una y otra vez evitando la erradicación a manos de una oposición aparentemente interminable e insuperable. Sin embargo, como parece suceder en estos tiempos, también vio el ascenso de algunos de los héroes más grandes y figuras más importantes de la humanidad.
    </p>

    <?php
    $sql = "SELECT * FROM personajes WHERE categoria = 'Figuras notables'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $nombre = strtolower($row["nombre"]);
            $clase_personalizada = 'notable';

            if (strpos($nombre, 'halsey') !== false) {
                $clase_personalizada = 'halsey';
            } elseif (strpos($nombre, 'miranda') !== false) {
                $clase_personalizada = 'miranda';
            } elseif (strpos($nombre, 'johnson') !== false) {
                $clase_personalizada = 'johnson';
            } elseif (strpos($nombre, 'echo') !== false) {
                $clase_personalizada = 'echo';
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
    } else {
        echo "<p style='text-align:center;'>No se encontraron personajes en esta categoría.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
