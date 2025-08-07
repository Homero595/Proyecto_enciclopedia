<?php
session_start();

$conexion = new mysqli("", "", "", "");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT p.*, u.usuario
        FROM personajescomunidad p 
        JOIN usuarios u ON p.id_usuario = u.id_usuario 
        ORDER BY p.id_personaje DESC";
        $resultado = $conexion->query("SELECT p.*, u.nombre_usuario, u.imagen_perfil FROM personajescomunidad p INNER JOIN usuario u ON p.id_usuario = u.id ORDER BY p.id_personaje DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Personajes de la Comunidad</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <style>
       body {
           background-image: url("https://rare-gallery.com/thumbs/4582760-master-chief-halo-halo-4-xbox-one-halo-master-chief-collection-video-games.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #ffffff;
            font-family: 'Orbitron', sans-serif;
            margin: 0;
            padding: 0;
       }

        .top-bar {
            display: flex;
            justify-content: flex-end;
            padding: 20px;
            background-color: #0d0d0d;
            border-bottom: 1px solid #00faff;
        }

        .top-bar a {
            background-color: #00faff;
            color: #000;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .top-bar a:hover {
            background-color: #00d4d4;
        }

        h1 {
            text-align: center;
            color: #00faff;
            text-shadow: 0 0 10px #00faff;
            margin: 30px 0 10px;
        }

        .boton-agregar {
            display: block;
            margin: 0 auto 30px;
            background-color: #00faff;
            color: #000;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            width: fit-content;
            box-shadow: 0 0 15px #00faff;
            transition: 0.3s;
        }

        .boton-agregar:hover {
            background-color: #00d4d4;
        }

        .personaje-contenedor {
            margin-bottom: 40px;
            position: relative;
            width: 90%;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
        }

        .autor {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            margin-left: 10px;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 8px;
        }

        .nombre-usuario {
            color: #00ffff;
            font-weight: bold;
            font-size: 14px;
        }

        .personaje {
            background: #1c1c1c;
            border: 2px solid #00faff55;
            border-left: 5px solid #00ff88;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 0 20px #00faff22;
        }

        .info-personaje {
            display: flex;
            flex-wrap: wrap;
        }

        .info-personaje img {
            width: 220px;
            height: 220px; 
            object-fit: cover; 
            border-radius: 10px;
            box-shadow: 0 0 12px #00faff66;
            margin-right: 30px;
            flex-shrink: 0; 
        }

        .info-detalles {
            flex: 1;
            min-width: 280px;
        }

        .nombre-personaje {
            font-size: 24px;
            color: #00faff;
            margin-bottom: 10px;
        }

        .descripcion {
            margin: 10px 0;
            line-height: 1.6;
            color: #ccc;
        }

        .fecha {
            font-size: 0.8em;
            color: #888;
        }

        .acciones a {
            margin-right: 10px;
            color: #00faff;
            text-decoration: none;
            font-weight: bold;
        }

        .acciones a:hover {
            text-decoration: underline;
            color: #00ffaa;
        }
    </style>
</head>
<body>

    <div class="top-bar">
        <a href="index.php">Volver al inicio</a>
    </div>

    <h1>Personajes de la Comunidad</h1>

    <a class="boton-agregar" href="agregar_personaje.php">Agregar nuevo personaje</a>

    <?php if ($resultado->num_rows > 0): ?>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
            <div class="personaje-contenedor">
                <div class="autor">
                    <img src="<?= htmlspecialchars($fila['imagen_perfil']) ?>" alt="avatar" class="avatar">
                    <span class="nombre-usuario"><?= htmlspecialchars($fila['nombre_usuario']) ?></span>
                </div>
                <div class="personaje">
                    <div class="info-personaje">
                        <img src="<?= htmlspecialchars($fila['imagen_url']) ?>" alt="Imagen del personaje">
                        <div class="info-detalles">
                            <h2 class="nombre-personaje"><?= htmlspecialchars($fila['nombre']) ?></h2>
                            <p class="descripcion"><?= nl2br(htmlspecialchars($fila['descripcion'])) ?></p>
                            <p class="fecha">Publicado el <?= $fila['fecha_creacion'] ?></p>
                            <div class="acciones">
                                <a href="editar_personaje.php?id_personaje=<?= $fila["id_personaje"] ?>">Editar</a>
                                <a href="eliminar_personaje.php?id_personaje=<?= $fila["id_personaje"] ?>" onclick="return confirm('¿Estás seguro de eliminar este personaje?');">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p style="text-align: center;">No hay personajes registrados todavía.</p>
    <?php endif; ?>

    <?php $conexion->close(); ?>

</body>
</html>