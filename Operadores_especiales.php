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
    <title>Operadores Especiales</title>
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

        .container.ash {
            background: linear-gradient(135deg, #3c3f2a, #5c5f3a);
            color: #d3ffcc;
            border-left: 10px solid #7b8c47;
            box-shadow: 0 0 25px rgba(123, 140, 71, 0.4);
        }

        .container.olivia {
            background: linear-gradient(135deg, #5c4d2f, #837145);
            color: #fff0d0;
            border-left: 10px solid #c2a56b;
            box-shadow: 0 0 25px rgba(194, 165, 107, 0.4);
        }

        .container.mark {
            background: linear-gradient(135deg, #223322, #335533);
            color: #d4ffd4;
            border-left: 10px solid #66bb66;
            box-shadow: 0 0 25px rgba(102, 187, 102, 0.4);
        }

        .container.veta {
            background: linear-gradient(135deg, #444444, #606060);
            color: #eeeeee;
            border-left: 10px solid #aaaaaa;
            box-shadow: 0 0 25px rgba(180, 180, 180, 0.4);
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

<h1>Operadores Especiales</h1>
<p style="text-align: justify; max-width: 1000px; margin: 0 auto 40px auto; line-height: 1.8; text-transform: lowercase;">
    la oficina de inteligencia naval mantiene cientos de unidades de operaciones especiales distintas, cada una comisionada y empleada para tareas diversas y variadas. la mayoría de ellas son desconocidas entre sí, pero todas funcionan en una danza delicadamente coordinada que es invisible a todos los ojos, excepto a aquellos en los niveles más altos de la oni.
</p>

<?php
$sql = "SELECT * FROM personajes WHERE categoria = 'operadores especiales'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $nombre = strtolower($row["nombre"]);
        $clase = "";

        if (strpos($nombre, 'ash') !== false) {
            $clase = 'ash';
        } elseif (strpos($nombre, 'olivia') !== false) {
            $clase = 'olivia';
        } elseif (strpos($nombre, 'mark') !== false) {
            $clase = 'mark';
        } elseif (strpos($nombre, 'veta') !== false) {
            $clase = 'veta';
        } else {
            $clase = 'default';
        }

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
