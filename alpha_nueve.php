<?php 
// Datos de conexión a la base de datos
$servername = "sql206.infinityfree.com";
$username = "if0_38917772";
$password = "Amu7w6UeR7MlN";
$dbname = "if0_38917772_db_unsc";

// Crear la conexión con MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hubo error al conectar
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Establecer codificación de caracteres a UTF-8
$conn->set_charset("utf8mb4");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alpha Nueve</title>

    <!-- Fuente digital desde Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">

    <style>
        /* Estilo general del cuerpo de la página */
        body {
            font-family: 'Orbitron', Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.9)),
                        url('https://wallpapercave.com/wp/wp2797149.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        /* Título principal */
        h1 {
            text-align: center;
            color: #ffffff;
            margin-top: 10px;
            text-shadow: 1px 1px 6px #000;
        }

        /* Barra superior con botón de regreso */
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

        /* Contenedor de cada personaje */
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

        /* Imagen del personaje */
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

        /* Información del personaje */
        .character-info {
            flex: 2 1 500px;
        }

        /* Distribución en rejilla de los datos */
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

        /* Descripción del personaje */
        .description {
            text-align: justify;
            line-height: 1.6;
            color: inherit;
        }

        .container h2 {
            color: inherit;
        }

        /* Colores personalizados por personaje */
        .container.buck {
            background: linear-gradient(135deg, #1b4021, #2d6b34);
            border-left: 10px solid #00ff00;
            box-shadow: 0 0 25px rgba(0, 255, 0, 0.4);
        }

        .container.crespo {
            background: linear-gradient(135deg, #5c1d1d, #8b2f2f);
            border-left: 10px solid #c0392b;
            box-shadow: 0 0 25px rgba(192, 57, 43, 0.4);
        }

        .container.agu {
            background: linear-gradient(135deg, #1c3b5a, #2c5e90);
            border-left: 10px solid #2980b9;
            box-shadow: 0 0 25px rgba(41, 128, 185, 0.4);
        }

        .container.taylor {
            background: linear-gradient(135deg, #804000, #cc6600);
            border-left: 10px solid #ff8000;
            box-shadow: 0 0 25px rgba(255, 128, 0, 0.4);
        }

        .container.ketola {
            background: linear-gradient(135deg, #2a4e2a, #4caf50);
            border-left: 10px solid #8bc34a;
            box-shadow: 0 0 25px rgba(139, 195, 74, 0.4);
        }

        .container.novato {
            background: linear-gradient(135deg, #555, #888);
            border-left: 10px solid #ccc;
            box-shadow: 0 0 25px rgba(180, 180, 180, 0.4);
        }

        .container.dare {
            background: linear-gradient(135deg, #2a3b4d, #4c6e90);
            border-left: 10px solid #81d4fa;
            box-shadow: 0 0 25px rgba(129, 212, 250, 0.4);
        }
    </style>
</head>
<body>

    <!-- Botón para regresar al inicio -->
    <div class="top-bar">
        <a href="index.php">Volver al inicio</a>
    </div>

    <!-- Título y descripción general -->
    <h1>Alpha Nueve</h1>
    <p style="text-align: justify; max-width: 1000px; margin: 0 auto 40px auto; line-height: 1.8;">
        El escuadrón ODST conocido como Alpha Nueve fue clave durante las incursiones terrestres en la invasión de Nueva Mombasa y otras misiones de alto riesgo. Cada miembro trajo una habilidad distinta que los hizo sobrevivir incluso en las situaciones más adversas.
    </p>

    <?php
    // Consulta para obtener personajes de la categoría "Alpha Nueve"
    $sql = "SELECT * FROM personajes WHERE categoria = 'Alpha Nueve'";
    $resultado = $conn->query($sql);

    // Si hay resultados
    if ($resultado->num_rows > 0) {
        // Iterar por cada personaje
        while ($row = $resultado->fetch_assoc()) {
            $nombre = strtolower($row["nombre"]);
            $clase = "notable"; // Clase por defecto

            // Determinar clase CSS según nombre
            if (strpos($nombre, 'buck') !== false) {
                $clase = 'buck';
            } elseif (strpos($nombre, 'crespo') !== false) {
                $clase = 'crespo';
            } elseif (strpos($nombre, 'kojo') !== false || strpos($nombre, 'agu') !== false) {
                $clase = 'agu';
            } elseif (strpos($nombre, 'taylor') !== false) {
                $clase = 'taylor';
            } elseif (strpos($nombre, 'ketola') !== false) {
                $clase = 'ketola';
            } elseif (strpos($nombre, 'novato') !== false) {
                $clase = 'novato';
            } elseif (strpos($nombre, 'dare') !== false) {
                $clase = 'dare';
            }

            // Mostrar contenedor del personaje
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
        // Si no se encontraron personajes
        echo "<p style='text-align:center;'>No se encontraron personajes en esta categoría.</p>";
    }

    // Cerrar conexión
    $conn->close();
    ?>
</body>
</html>