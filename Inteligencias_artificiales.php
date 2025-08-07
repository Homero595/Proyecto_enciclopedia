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
    <title>Inteligencias Artificiales</title>
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
            color: #f5f5f5;
        }

        /* Colores personalizados por IA */
        .roland    { background: linear-gradient(135deg, #4e3200, #f5b400); color: #fff2c7; border-left: 10px solid #ffc107; }
        .gabriela  { background: linear-gradient(135deg, #d0ecff, #a5d4ff); color: #002233; border-left: 10px solid #99ccff; }
        .kalmiya   { background: linear-gradient(135deg, #7dcf8b, #57a56e); color: #f0fff5; border-left: 10px solid #88e59e; }
        .iona      { background: linear-gradient(135deg, #4e392e, #b8885f); color: #fff4e1; border-left: 10px solid #cd7f32; }
        .blackbox  { background: linear-gradient(135deg, #4d4d4d, #6e6e6e); color: #e0e0e0; border-left: 10px solid #888; }
        .auntie    { background: linear-gradient(135deg, #000000, #2b2b2b); color: #cccccc; border-left: 10px solid #333; }
        .deja      { background: linear-gradient(135deg, #d8f0fa, #9fc8e1); color: ##001c2e; border-left:10px solid #73c2e7; }
        .super     { background: linear-gradient(135deg, #1e4021, #2f6030); color: #d4f7d4; border-left: 10px solid #4caf50; }
        .wellsley  { background: linear-gradient(135deg, #b6dcf9, #8fc9f0); color: #002b40; border-left: 10px solid #80d4ff; }

        .container h2 {
            color: inherit;
        }
    </style>
</head>
<body>

    <div class="top-bar">
        <a href="index.php">Volver al inicio</a>
    </div>

    <h1>Inteligencias Artificiales</h1>
    <p style="text-align: justify; max-width: 1000px; margin: 0 auto 40px auto; line-height: 1.8;">
        como construcciones de software altamente sofisticadas, las inteligencias artificiales (ia) muestran muchas de las características funcionales y de comportamiento asociadas con el pensamiento biológico y la vida. aunque todas demuestran la capacidad de sentencia, percibir y procesar información del mundo real, y pueden tomar acciones independientes, no son necesariamente autoconscientes ni capaces de creatividad.
    </p>

    <?php
    $sql = "SELECT * FROM InteligenciasArtificiales WHERE categoria = 'IA'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $nombre = strtolower($row["nombre"]);
            $clase = "container";

            if (strpos($nombre, 'roland') !== false) {
                $clase .= " roland";
            } elseif (strpos($nombre, 'gabriela') !== false) {
                $clase .= " gabriela";
            } elseif (strpos($nombre, 'kalmiya') !== false) {
                $clase .= " kalmiya";
            } elseif (strpos($nombre, 'iona') !== false) {
                $clase .= " iona";
            } elseif (strpos($nombre, 'black') !== false) {
                $clase .= " blackbox";
            } elseif (strpos($nombre, 'auntie') !== false) {
                $clase .= " auntie";
            } elseif (strpos($nombre, 'deja') !== false) {
                $clase .= " deja";
            } elseif (strpos($nombre, 'superintendente') !== false || strpos($nombre, 'vergil') !== false) {
                $clase .= " super";
            } elseif (strpos($nombre, 'wellsley') !== false) {
                $clase .= " wellsley";
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
    } else {
        echo "<p style='text-align:center;'>No se encontraron IAs en esta categoría.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
