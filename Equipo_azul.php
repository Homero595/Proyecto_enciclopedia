<?php 
$servername = 
$username = 
$password = 
$dbname = "if0_3891772_db_unsc";

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
    <title>Equipo Azul</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <style>
        body {
    font-family: 'Orbitron', Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.9)),
                url('https://wallpapercave.com/wp/wp2797149.jpg') no-repeat center center fixed;
    background-size: cover;
    color: #e3f3ff;
             }

        h1 {
            text-align: center;
            color: #9ddfff;
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
            background-color: #0284c7;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .top-bar a:hover {
            background-color: #0369a1;
        }

        .container {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 40px;
            padding: 40px;
            border-radius: 10px;
            margin-bottom: 40px;
            background: linear-gradient(135deg, #0d1b2a, #1b263b);
            border-left: 10px solid #00b4d8;
            box-shadow: 0 0 25px rgba(0, 183, 255, 0.3);
        }

        .container.fred {
            border-left-color: #00bfff;
        }

        .container.kelly {
            border-left-color: #ffd700;
        }

        .container.linda {
            border-left-color: #ff69b4;
        }

        .container.sam {
            border-left-color: #98ff98;
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
            background: rgba(255, 255, 255, 0.08);
            padding: 10px;
            border-radius: 5px;
            font-size: 0.95em;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .description {
            text-align: justify;
            line-height: 1.6;
            color: #d9f0ff;
        }

        .container h2 {
            color: #66d9ff;
        }
    </style>
</head>
<body>

    <div class="top-bar">
        <a href="index.php">Volver al inicio</a>
    </div>

    <h1>Equipo Azul</h1>
    <p style="text-align: justify; max-width: 1000px; margin: 0 auto 40px auto; line-height: 1.8;">
        Todos los elementos de combate spartan desplegados durante la guerra, el equipo azul tiene el historial más prodigioso, con más de 220 operaciones militares realizadas. si bien la lista de todos los equipos spartan evoluciona con el tiempo, estos pocos miembros han formado el núcleo de este equipo desde sus primeros años.
    </p>
<p style="text-align: justify; max-width: 1000px; margin: 0 auto 40px auto; line-height: 1.8;">
        El Equipo Azul es generalmente considerado el equipo de ataque más exitoso en la historia del UNSC, y su impacto durante la guerra con el Covenant es prácticamente imposible de exagerar. Forjado en el fuego del sacrificio que definió el programa SPARTAN-II, la pérdida de Samuel-034 en su primer enfrentamiento con el Covenant fue formativa. Durante los primeros años que siguieron, la presencia indomable del equipo fue profundamente sentida tanto por el Covenant como por los rebeldes humanos, muchos de los cuales les atribuyeron el estatus de mito. En su corazón estaba John-117, cuya inquebrantable determinación definía el espíritu del equipo incluso cuando no estaba presente.
    </p>

    <?php
    $sql = "SELECT * FROM personajes WHERE categoria = 'Equipo azul'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $nombre = strtolower($row["nombre"]);
            $clase = 'container';

            if (strpos($nombre, 'frederic') !== false) {
                $clase .= ' fred';
            } elseif (strpos($nombre, 'kelly') !== false) {
                $clase .= ' kelly';
            } elseif (strpos($nombre, 'linda') !== false) {
                $clase .= ' linda';
            } elseif (strpos($nombre, 'samuel') !== false) {
                $clase .= ' sam';
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
    } else {
        echo "<p style='text-align:center;'>No se encontraron personajes en esta categoría.</p>";
    }

    $conn->close();
    ?>
</body>
</html>