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
    <title>Héroes de Zeta Halo</title>
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

        /* Colores personalizados por personaje */
        .griffin {
            background: linear-gradient(135deg, #3c4a50, #5a6b73);
            border-left: 10px solid #a0c4d8;
            color: #e4f1f9;
        }

        .makovich {
            background: linear-gradient(135deg, #1b2d3a, #2f3e4d);
            border-left: 10px solid #406080;
            color: #d0e7ff;
        }

        .stone {
            background: linear-gradient(135deg, #2d4e60, #4c6c84);
            border-left: 10px solid #70b0f0;
            color: #e1f5ff;
        }

        .kovan {
            background: linear-gradient(135deg, #223622, #395839);
            border-left: 10px solid #5fa55f;
            color: #ddffe2;
        }

        .sorel {
            background: linear-gradient(135deg, #4a4a4a, #6e6e6e);
            border-left: 10px solid #aaaaaa;
            color: #f0f0f0;
        }

        .horvath {
            background: linear-gradient(135deg, #5e4a30, #826d4e);
            border-left: 10px solid #d2b48c;
            color: #fff4e0;
        }

        .vettel {
            background: linear-gradient(135deg, #5a1a1a, #7d2e2e);
            border-left: 10px solid #b22222;
            color: #ffe4e4;
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

    <h1>Héroes de Zeta Halo</h1>
    <p style="text-align: justify; max-width: 1000px; margin: 0 auto 40px auto; line-height: 1.8;">
        En el caos de Zeta Halo, un pequeño grupo de valientes se alzó contra toda probabilidad para luchar por la humanidad y restaurar el equilibrio. Estos son los héroes olvidados y los guardianes silenciosos del anillo: los Héroes de Zeta Halo.
    </p>

    <?php
    $sql = "SELECT * FROM personajes WHERE categoria = 'heroeszetahalo'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $nombre = strtolower($row["nombre"]);
            $clase = '';

            if (strpos($nombre, 'griffin') !== false) $clase = 'griffin';
            elseif (strpos($nombre, 'makovich') !== false) $clase = 'makovich';
            elseif (strpos($nombre, 'stone') !== false) $clase = 'stone';
            elseif (strpos($nombre, 'kovan') !== false) $clase = 'kovan';
            elseif (strpos($nombre, 'sorel') !== false) $clase = 'sorel';
            elseif (strpos($nombre, 'horvath') !== false) $clase = 'horvath';
            elseif (strpos($nombre, 'vettel') !== false) $clase = 'vettel';

            echo "<div class='container $clase'>";
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
