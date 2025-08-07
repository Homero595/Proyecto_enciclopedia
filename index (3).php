<!-- Inicia la sesión del usuario -->
<?php session_start(); ?> 
<?php
// Establece conexión con la base de datos
$conexion = new mysqli(""; "", "", "");
if ($conexion->connect_error) {
     // Muestra error si la conexión falla
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
<!-- Define el tipo de documento HTML5 -->
<!DOCTYPE html> 
<!-- Especifica el idioma de la página -->
<html lang="es">
<head>
    <!-- Define la codificación de caracteres -->
    <meta charset="UTF-8" />
    <!-- Configura el diseño adaptable -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Título de la página -->
    <title>UNSC Command Database</title>

    <style>
        body {
             /* Estilos CSS para diseño visual, tipografías, animaciones y efectos */
            background-image: url('https://preview.redd.it/halo-infinite-ui-map-style-frames-v0-51k7vbu5zcpb1.jpg?width=1080&crop=smart&auto=webp&s=f931c6ddc211c859c538eb9c4df7cc447d57872a');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 40px;
            min-height: 100vh;
            text-align: center;
        }

        .typewriter {
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            border-right: 2px solid cyan;
            animation: typing 4s steps(40, end), blink 0.75s step-end infinite;
            font-size: 2.5em;
            margin-top: 20px;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink {
            from, to { border-color: transparent }
            50% { border-color: cyan }
        }

        .fade-in {
            opacity: 0;
            animation: fadeIn ease 1s forwards;
        }

        .fade-in:nth-child(1) { animation-delay: 1s; }
        .fade-in:nth-child(2) { animation-delay: 2s; }
        .fade-in:nth-child(3) { animation-delay: 3s; }
        .fade-in:nth-child(4) { animation-delay: 4s; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        p {
            max-width: 800px;
            margin: 20px auto;
            line-height: 1.6;
        }

        .image-container {
            display: inline-block;
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.4);
            margin-top: 40px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0, 255, 255, 0.2);
        }

        .image-container:hover {
            transform: scale(1.02);
            box-shadow: 0 0 30px rgba(0, 255, 255, 0.6);
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .menu-container {
            display: flex;
            justify-content: center;
            gap: 50px;
            flex-wrap: wrap;
            margin-top: 60px;
        }

        .menu-item {
            background: rgba(0, 255, 255, 0.1);
            border: 2px solid #00ffff;
            border-radius: 12px;
            width: 200px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 10px;
            text-decoration: none;
            color: white;
        }

        .menu-item:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px #00ffff;
        }

        .menu-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }

        .menu-item p {
            margin-top: 10px;
            font-weight: bold;
            font-size: 1.1em;
        }

        .user-box {
            position: absolute;
            top: 20px;
            right: 20px;
            text-align: right;
            z-index: 999;
        }

        .user-box img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid cyan;
        }

        .user-box a {
            color: cyan;
            text-decoration: none;
            font-weight: bold;
            margin: 0 5px;
        }

        .user-box a.logout {
            color: red;
        }

        .user-box span {
            display: block;
            color: white;
            font-size: 0.9em;
        }

        .comentarios {
            max-width: 800px;
            margin: 60px auto 40px auto;
            background-color: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.2);
        }

        .comentario {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 10px 0;
        }

        .comentario img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .comentario strong {
            color: cyan;
        }

        .comentario p {
            margin: 5px 0;
        }

        .comentarios form textarea {
            width: 100%;
            height: 80px;
            resize: none;
            margin-bottom: 10px;
            border-radius: 6px;
            border: none;
            padding: 10px;
            font-family: Arial;
        }

        .comentarios button {
            background-color: cyan;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
        }

        .comentarios button:hover {
            background-color: #00e5e5;
        }
    </style>
</head>
<body>

    <!-- Caja superior con perfil de usuario o enlaces de login/registro -->
    <div class="user-box">
        <?php if (isset($_SESSION["nombre_usuario"])): ?>
            <!-- Muestra imagen y nombre del usuario autenticado -->
            <img src="<?= htmlspecialchars($_SESSION['imagen_perfil']) ?>" alt="Perfil" />
            <span><?= htmlspecialchars($_SESSION["nombre_usuario"]) ?></span>
            <a href="perfil.php">Editar perfil</a> |
            <a href="logout.php" class="logout">Cerrar sesión</a>
        <?php else: ?>
            <!-- Si no hay sesión, muestra enlaces a login y registro -->
            <a href="login.php">Iniciar sesión</a> |
            <a href="registro.php">Registrarse</a>
        <?php endif; ?>
    </div>

    <!-- Contenedor principal con fondo oscuro -->
    <div class="overlay">
        <header>
            <h1 class="typewriter">UNSC Command Database</h1>
            <p>Access Restricted – Authorized Personnel Only</p>
        </header>

        <main>
            <!-- Sección de bienvenida -->
            <section>
                <h1>Bienvenido a la Base de Datos del UNSC</h1>
                <p class="fade-in">
                    Usuario autenticado. Te damos la bienvenida a la plataforma oficial de consulta del Comando Espacial de las Naciones Unidas (UNSC).
                    Esta enciclopedia digital ha sido creada con el propósito de preservar, analizar y difundir la información más relevante sobre nuestros miembros,                     misiones, unidades y tecnología militar.
                </p>
                <p class="fade-in">
                    Aquí encontrarás registros detallados de soldados, científicos, oficiales y figuras clave que han contribuido a la defensa de la humanidad a lo                       largo de décadas de conflicto interplanetario.
                </p>
                <p class="fade-in">
                    Te recordamos que parte de esta información puede estar clasificada o restringida. Esta herramienta está diseñada como archivo histórico y guía                       para investigadores, entusiastas y Spartans activos.
                </p>
                <p class="fade-in"><strong>Gloria al UNSC. Por la humanidad.</strong></p>
            </section>

            <section>
                <!-- Imagen decorativa -->
                <div class="image-container">
                    <img src="https://images.steamusercontent.com/ugc/52448099175874608/178145990D752513EC66CCF3872287FAF97A077D/?imw=637&imh=358&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" alt="UNSC Command Visualization" />
                </div>
            </section>

            <!-- Menú de navegación a secciones temáticas -->
            <section class="menu-container">
            <a href="jefe_cortana.php" class="menu-item">
                    <img src="https://alfabetajuega.com/hero/2025/01/halo-jefe-maestro.jpg?width=1200&aspect_ratio=16:9" alt="Jefe Maestro y Cortana" />
                    <p>Jefe Maestro y Cortana</p>
                </a>

                <a href="figuras_notables.php" class="menu-item">
                    <img src="https://www.haloprojectbrasil.com.br/wp-content/uploads/2017/10/450px-HaloReach_-_CAPT_Jacob_Keyes-225x300.jpg" alt="Figuras Notables"/>
                    <p>Figuras Notables</p>
                </a>

                <a href="Equipo_azul.php" class="menu-item">
                    <img src="https://pm1.aminoapps.com/6282/2871addb9b835e5f67df357532b9cc138bcd7fe1_hq.jpg" alt="Equipo azul" />
                    <p>Equipo azul</p>
                </a>

                <a href="Spirit_of_fire.php" class="menu-item">
                    <img src="https://images.squarespace-cdn.com/content/v1/58e1668c2e69cfd46ac3028a/1609703705814-QPFD1KI23QWFM2DDNZYN/cutter+rounded.png?format=1500w" alt="Spirit of fire" />
                    <p>Spirit of fire</p>
                </a>

                <a href="alpha_nueve.php" class="menu-item">
                    <img src="https://halo.wiki.gallery/images/thumb/9/97/HBB_-_Alpha-Nine.jpg/300px-HBB_-_Alpha-Nine.jpg" alt="Alpha nueve" />
                    <p>Alpha nueve</p>
                </a>

                <a href="Equipo_noble.php" class="menu-item">
                    <img src="https://preview.redd.it/no-noble-six-how-far-are-they-making-it-in-the-story-v0-ng7zfm6g6hhc1.jpeg?width=1080&crop=smart&auto=webp&s=9bf3bd39c30e9d53a5e272ae7ff78b5681dd0a49" alt="Equipo Noble" />
                    <p>Equipo Noble</p>
                </a>

                <a href="UNSC_infinity.php" class="menu-item">
                    <img src="https://images.squarespace-cdn.com/content/v1/58e1668c2e69cfd46ac3028a/1609703354096-Q09SMU5LR87NQR05ZTI4/lasky+rounded.png?format=1500w" alt="UNSC Infinity" />
                    <p>UNSC Infinity</p>
                </a>

                <a href="Heroes_zeta_halo.php" class="menu-item">
                    <img src="https://cdna.artstation.com/p/assets/images/images/065/845/792/large/manmighty-protocol-rubicon-3.jpg?1691395898" alt="Heroes de Zeta Halo" />
                    <p>Heroes de Zeta Halo</p>
                </a>

                <a href="Personal_naval.php" class="menu-item">
                    <img src="https://i.pinimg.com/736x/17/65/54/17655437418ffd1942345554bc82671b.jpg" alt="Personal naval" />
                    <p>Personal naval</p>
                </a>

                <a href="Spartans_3.php" class="menu-item">
                    <img src="https://c4.wallpaperflare.com/wallpaper/547/760/11/halo-spartans-xbox-video-game-art-halo-3-hd-wallpaper-preview.jpg" alt="Personal Spartan's 3" />
                    <p>Personal Spartan's 3</p>
                </a>

                <a href="Inteligencias_artificiales.php" class="menu-item">
                    <img src="https://i.pinimg.com/736x/3a/86/8c/3a868ca225128c2a68e28d2f799fb09e.jpg" alt="Inteligencias Artificiales" />
                    <p>Inteligencias Artificiales</p>
                </a>

                <a href="Operadores_especiales.php" class="menu-item"> 
                    <img src="https://images.squarespace-cdn.com/content/v1/58e1668c2e69cfd46ac3028a/1539278139141-R7QC2I88TOTFUUR8T9AW/Kilo-Five?format=1500w" alt="Operadores especiales" />
                    <p>Operadores especiales</p>
                </a>

                <a href="Salvadores.php" class="menu-item">
                    <img src="https://s.yimg.com/ny/api/res/1.2/oZi5KAMMRQwDiVanOStCiA--/YXBwaWQ9aGlnaGxhbmRlcjt3PTk2MDtoPTQ4MA--/https://media.zenfs.com/es/levelup_525/5dca50538d0931582879600bb788d7a8" alt="Salvadores" />
                    <p>Salvadores</p>
                </a>
                <a href="personajes_comunidad.php" class="menu-item">
                    <img src="https://i.ytimg.com/vi/oflPWmWbfB4/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLAMHi-sxQ8GZYOvGzpimgGosUagZQ" alt="Personajes de la comunidad" />
                    <p>Personajes de la comunidad</p>
                </a>
                </section>
  <!-- Sección de comentarios estilo foro -->
  <section class="comentarios">
  <h2>Comentarios del foro</h2>

  <?php if (isset($_SESSION['nombre_usuario'])): ?>
    <!-- Formulario para enviar comentario -->
    <form action="guardar_comentario.php" method="POST" style="margin-bottom: 20px;">
      <textarea name="comentario" placeholder="Escribe tu comentario..."></textarea>
      <input type="hidden" name="categoria" value="foro_general">
      <input type="hidden" name="respuesta_a" value="0">
      <button type="submit">Comentar</button>
    </form>
  <?php else: ?>
    <!-- Invitación a iniciar sesión para comentar -->
    <p><a href="login.php">Inicia sesión</a> para comentar.</p>
  <?php endif; ?>

  <?php
    // Función recursiva para mostrar comentarios y respuestas
    include "conexion.php";

    function mostrarComentarios($conexion, $padre_id = 0, $nivel = 0) {
      $stmt = $conexion->prepare("SELECT * FROM comentarios WHERE categoria='foro_general' AND respuesta_a = ? ORDER BY fecha DESC");
      $stmt->bind_param("i", $padre_id);
      $stmt->execute();
      $resultado = $stmt->get_result();

      while ($row = $resultado->fetch_assoc()) {
        // Margen visual para comentarios anidados
        $margen = $nivel * 30;
        echo '<div class="comentario" style="margin-left: '.$margen.'px; background-color: rgba(0, 255, 255, 0.05); border: 1px solid rgba(0, 255, 255, 0.1);                       border-radius: 10px; padding: 10px; margin-bottom: 10px;">';
        // Función recursiva para mostrar comentarios y respuestas
        echo '<div style="display: flex; align-items: center; margin-bottom: 5px;">';
        echo '<img src="'.htmlspecialchars($row['imagen_perfil']).'" alt="Perfil">';
        echo '<strong style="margin-left: 10px;">'.htmlspecialchars($row['nombre_usuario']).'</strong>';
        echo '</div>';
        // Contenido del comentario
        echo '<p style="text-align: left;">'.htmlspecialchars($row['comentario']).'</p>';
        echo '<small style="display:block; text-align: right; color: #00ffff;">'.$row['fecha'].'</small>';

        if (isset($_SESSION['nombre_usuario'])) {
        // Si el comentario es del usuario actual, permite eliminarlo
          echo '<div style="margin-top: 10px;">';
          if ($_SESSION['nombre_usuario'] === $row['nombre_usuario']) {
            echo '<form action="eliminar_comentario.php" method="POST" style="display:inline">';
            echo '<input type="hidden" name="comentario_id" value="'.$row['id'].'">';
            echo '<button type="submit" style="background:red;color:white;border:none;padding:3px 8px;border-radius:6px;margin-right:5px;                                               cursor:pointer">Eliminar</button>';
            echo '</form>';
          }
          // Botón para mostrar formulario de respuesta
          echo '<button onclick="responder('.$row['id'].')" style="background:#00ffff;color:black;border:none;padding:3px 8px;border-radius:6px;margin-right:5px;                     cursor:pointer">Responder</button>';
          // Formulario de respuesta oculto
          echo '<form action="guardar_comentario.php" method="POST" id="respuesta-form-'.$row['id'].'" style="display:none; margin-top:10px">';
          echo '<textarea name="comentario" placeholder="Tu respuesta..." style="width:100%;height:60px;border-radius:6px;padding:8px;"></textarea>';
          echo '<input type="hidden" name="categoria" value="foro_general">';
          echo '<input type="hidden" name="respuesta_a" value="'.$row['id'].'">';
          echo '<button type="submit" style="margin-top:5px;background-color:cyan;color:black;padding:6px 12px;border:none;border-radius:6px;">Responder</button>';
          echo '</form>';
          echo '</div>';
        }

        echo '</div>';

        // Llamada recursiva para mostrar respuestas al comentario actual
        mostrarComentarios($conexion, $row['id'], $nivel + 1);
      }
    }

    mostrarComentarios($conexion);
  ?>
</section>

<!-- Script para mostrar u ocultar formularios de respuesta -->
<script>
function responder(id) {
  const form = document.getElementById('respuesta-form-' + id);
  form.style.display = (form.style.display === 'none') ? 'block' : 'none';
  form.scrollIntoView({ behavior: 'smooth', block: 'start' });
}
</script>

        </main>
    </div>
</body>
</html>