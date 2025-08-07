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
    <title>Equipo Noble</title>
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

        /* Estilos por personaje */
        .carter {
            background: linear-gradient(135deg, #1f3b5c, #2f5d9f);
            border-left: 10px solid #1e90ff;
            box-shadow: 0 0 25px rgba(30,144,255, 0.4);
        }

        .kat {
            background: linear-gradient(135deg, #2d4e68, #4fa9dc);
            border-left: 10px solid #00bfff;
            box-shadow: 0 0 25px rgba(0,191,255,0.4);
        }

        .jun {
            background: linear-gradient(135deg, #1b3e2b, #3e8e41);
            border-left: 10px solid #32cd32;
            box-shadow: 0 0 25px rgba(50,205,50,0.4);
        }

        .emile {
            background: linear-gradient(135deg, #2b2b2b, #4b4b4b);
            border-left: 10px solid #a9a9a9;
            box-shadow: 0 0 25px rgba(169,169,169,0.4);
        }

        .jorge {
            background: linear-gradient(135deg, #5e5100, #ffd700);
            border-left: 10px solid #ffea00;
            box-shadow: 0 0 25px rgba(255,234,0,0.4);
        }

        .noble6 {
            background: linear-gradient(135deg, #5a5a5a, #8f8f8f);
            border-left: 10px solid #c0c0c0;
            box-shadow: 0 0 25px rgba(192,192,192,0.4);
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
            color: #f0f0f0;
        }

        .container h2 {
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="top-bar">
        <a href="index.php">Volver al inicio</a>
    </div>

    <h1>Equipo Noble</h1>
    <p style="text-align: justify; max-width: 1000px; margin: 0 auto 40px auto; line-height: 1.8;">
        El Equipo Noble fue una escuadra de Spartans-IIIs y un Spartan-II que combatieron en Reach. Cada miembro contribuyó de forma crucial al destino de la humanidad en los momentos más oscuros del conflicto con el Covenant.
    </p>

    <?php
    $sql = "SELECT * FROM personajes WHERE categoria = 'equipo noble'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $nombre = strtolower($row["nombre"]);
            $clase = "";

            if (strpos($nombre, 'carter') !== false) $clase = 'carter';
            elseif (strpos($nombre, 'kat') !== false) $clase = 'kat';
            elseif (strpos($nombre, 'jun') !== false) $clase = 'jun';
            elseif (strpos($nombre, 'emile') !== false) $clase = 'emile';
            elseif (strpos($nombre, 'jorge') !== false) $clase = 'jorge';
            elseif (strpos($nombre, 'noble') !== false) $clase = 'noble6';

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
