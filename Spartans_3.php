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
    <title>Spartans III</title>
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

        /* Estilos personalizados por personaje */
        .franklin {
            background: linear-gradient(135deg, #1e2a3a, #2e3f52);
            color: #dce9f6;
            border-left: 10px solid #0d47a1;
            box-shadow: 0 0 25px rgba(13, 71, 161, 0.4);
        }

        .lucy {
            background: linear-gradient(135deg, #5c4332, #a67c52);
            color: #f5e9dd;
            border-left: 10px solid #bc8f61;
            box-shadow: 0 0 25px rgba(188, 143, 97, 0.4);
        }

        .thomas {
            background: linear-gradient(135deg, #3f3f3f, #6b6b6b);
            color: #e0e0e0;
            border-left: 10px solid #9e9e9e;
            box-shadow: 0 0 25px rgba(158, 158, 158, 0.4);
        }

        .kurt {
            background: linear-gradient(135deg, #595959, #9e9e9e);
            color: #ffffff;
            border-left: 10px solid #b0bec5;
            box-shadow: 0 0 25px rgba(176, 190, 197, 0.4);
        }

        .owen {
            background: linear-gradient(135deg, #8fd6ff, #3da9fc);
            color: #003b64;
            border-left: 10px solid #40c4ff;
            box-shadow: 0 0 25px rgba(64, 196, 255, 0.4);
        }

        .hazel {
            background: linear-gradient(135deg, #7a4f20, #b87333);
            color: #fff0e0;
            border-left: 10px solid #d2691e;
            box-shadow: 0 0 25px rgba(210, 105, 30, 0.4);
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

    <h1>Spartans III</h1>
    <p style="text-align: justify; max-width: 1000px; margin: 0 auto 40px auto; line-height: 1.8;">
    la principal contribución del proyecto spartan-iii en la guerra del covenant se puede encontrar en los amargos sacrificios realizados por cientos de jóvenes soldados en operaciones como prometheus y torpedo: victorias cruciales que se llegaron a un costo extraordinario. aquellos que sobrevivieron al conflicto continúan luchando en el frente, muchos aún desempeñan papel clave en la protección de la humanidad.
</p>

    <?php
    $sql = "SELECT * FROM personajes WHERE categoria = 'spartans3'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $nombre = strtolower($row["nombre"]);
            $clase = "";

            if (strpos($nombre, 'franklin') !== false) {
                $clase = "franklin";
            } elseif (strpos($nombre, 'lucy') !== false) {
                $clase = "lucy";
            } elseif (strpos($nombre, 'thomas') !== false) {
                $clase = "thomas";
            } elseif (strpos($nombre, 'kurt') !== false) {
                $clase = "kurt";
            } elseif (strpos($nombre, 'owen') !== false) {
                $clase = "owen";
            } elseif (strpos($nombre, 'hazel') !== false) {
                $clase = "hazel";
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
