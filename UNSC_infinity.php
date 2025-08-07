<?php 
$servername = "";
$username = "";
$password = "";
$dbname = "";

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
    <title>UNSC Infinity</title>
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

        .container.lasky {
            background: linear-gradient(135deg, #8d6e63, #bcaaa4);
            color: #fff3e0;
            border-left: 10px solid #a67c52;
            box-shadow: 0 0 25px rgba(166, 124, 82, 0.4);
        }

        .container.palmer {
            background: linear-gradient(135deg, #f2f2f2, #ffeaea);
            color: #2b2b2b;
            border-left: 10px solid #ff6b6b;
            box-shadow: 0 0 25px rgba(255, 107, 107, 0.4);
        }

        .container.locke {
            background: linear-gradient(135deg, #4a6e7f, #788f98);
            color: #e0f7ff;
            border-left: 10px solid #2d4d5a;
            box-shadow: 0 0 25px rgba(74, 110, 127, 0.4);
        }

        .container.tanaka {
            background: linear-gradient(135deg, #f0f8ff, #d1ecf1);
            color: #2b2b2b;
            border-left: 10px solid #61a5c2;
            box-shadow: 0 0 25px rgba(97, 165, 194, 0.4);
        }

        .container.vale {
            background: linear-gradient(135deg, #ffcccc, #ff9999);
            color: #2b2b2b;
            border-left: 10px solid #ff6f61;
            box-shadow: 0 0 25px rgba(255, 153, 153, 0.4);
        }

        .container.thorne {
            background: linear-gradient(135deg, #6c5ce7, #8e84e6);
            color: #f3eaff;
            border-left: 10px solid #5a4dcf;
            box-shadow: 0 0 25px rgba(108, 92, 231, 0.4);
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

    <h1>UNSC Infinity</h1>
    <p style="text-align: justify; max-width: 1000px; margin: 0 auto 40px auto; line-height: 1.8;">
        En el siglo 26, la nave insignia **UNSC Infinity** representó una nueva era en la guerra y exploración espacial, uniendo a algunos de los soldados más preparados de la humanidad. Esta sección destaca a los miembros clave que forman parte de esta fuerza de élite.
    </p>

    <?php
    $sql = "SELECT * FROM personajes WHERE categoria = 'unsc infinity'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $nombre = strtolower($row["nombre"]);
            $clase_personalizada = 'notable';

            if (strpos($nombre, 'lasky') !== false) {
                $clase_personalizada = 'lasky';
            } elseif (strpos($nombre, 'palmer') !== false) {
                $clase_personalizada = 'palmer';
            } elseif (strpos($nombre, 'locke') !== false) {
                $clase_personalizada = 'locke';
            } elseif (strpos($nombre, 'tanaka') !== false) {
                $clase_personalizada = 'tanaka';
            } elseif (strpos($nombre, 'vale') !== false) {
                $clase_personalizada = 'vale';
            } elseif (strpos($nombre, 'thorne') !== false) {
                $clase_personalizada = 'thorne';
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
