<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>UNSC Command Database</title>
    <style>
        body {
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
    </style>
</head>
<body>
    <div class="overlay">
        <header>
            <h1 class="typewriter">UNSC Command Database</h1>
            <p>Access Restricted – Authorized Personnel Only</p>
        </header>

        <main>
            <section>
                <h1>Bienvenido a la Base de Datos del UNSC</h1>
                <p class="fade-in">
                    Usuario autenticado. Te damos la bienvenida a la plataforma oficial de consulta del Comando Espacial de las Naciones Unidas (UNSC).
                    Esta enciclopedia digital ha sido creada con el propósito de preservar, analizar y difundir la información más relevante sobre nuestros miembros, misiones, unidades y tecnología militar.
                </p>
                <p class="fade-in">
                    Aquí encontrarás registros detallados de soldados, científicos, oficiales y figuras clave que han contribuido a la defensa de la humanidad a lo largo de décadas de conflicto interplanetario. Desde la Guerra del Contacto hasta las operaciones encubiertas del ONI, este repositorio contiene datos históricos, perfiles individuales y documentos desclasificados que forman parte del legado del UNSC.
                </p>
                <p class="fade-in">
                    Te recordamos que parte de esta información puede estar clasificada o restringida, y debe ser consultada con responsabilidad. Esta herramienta está diseñada para servir tanto como archivo histórico como guía de referencia para investigadores, entusiastas y miembros activos del programa Spartan.
                </p>
                <p class="fade-in"><strong>Gloria al UNSC. Por la humanidad.</strong></p>
            </section>

            <section>
                <div class="image-container">
                    <img src="https://images.steamusercontent.com/ugc/52448099175874608/178145990D752513EC66CCF3872287FAF97A077D/?imw=637&imh=358&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" alt="UNSC Command Visualization" />
                </div>
            </section>

            <section class="menu-container">
                <a href="jefe_cortana.php" class="menu-item">
                    <img src="https://alfabetajuega.com/hero/2025/01/halo-jefe-maestro.jpg?width=1200&aspect_ratio=16:9" alt="Jefe Maestro y Cortana" />
                    <p>Jefe Maestro y Cortana</p>
                </a>

                <a href="figuras_notables.php" class="menu-item">
                    <img src="https://www.haloprojectbrasil.com.br/wp-content/uploads/2017/10/450px-HaloReach_-_CAPT_Jacob_Keyes-225x300.jpg" alt="Figuras Notables"/>
                    <p>Figuras Notables</p>
                </a>

                <a href="equipo_azul.php" class="menu-item">
                    <img src="https://pm1.aminoapps.com/6282/2871addb9b835e5f67df357532b9cc138bcd7fe1_hq.jpg" alt="Equipo azul" />
                    <p>Equipo azul</p>
                </a>

                <a href="spirit_of_fire.php" class="menu-item">
                    <img src="https://images.squarespace-cdn.com/content/v1/58e1668c2e69cfd46ac3028a/1609703705814-QPFD1KI23QWFM2DDNZYN/cutter+rounded.png?format=1500w" alt="Spirit of fire" />
                    <p>Spirit of fire</p>
                </a>

                <a href="alpha_nueve.php" class="menu-item">
                    <img src="https://halo.wiki.gallery/images/thumb/9/97/HBB_-_Alpha-Nine.jpg/300px-HBB_-_Alpha-Nine.jpg" alt="Alpha nueve" />
                    <p>Alpha nueve</p>
                </a>

                <a href="equipo_noble.php" class="menu-item">
                    <img src="https://preview.redd.it/no-noble-six-how-far-are-they-making-it-in-the-story-v0-ng7zfm6g6hhc1.jpeg?width=1080&crop=smart&auto=webp&s=9bf3bd39c30e9d53a5e272ae7ff78b5681dd0a49" alt="Equipo Noble" />
                    <p>Equipo Noble</p>
                </a>

                <a href="unsc_infinity.php" class="menu-item">
                    <img src="https://images.squarespace-cdn.com/content/v1/58e1668c2e69cfd46ac3028a/1609703354096-Q09SMU5LR87NQR05ZTI4/lasky+rounded.png?format=1500w" alt="UNSC Infinity" />
                    <p>UNSC Infinity</p>
                </a>

                <a href="heroes_zeta_halo.php" class="menu-item">
                    <img src="https://cdna.artstation.com/p/assets/images/images/065/845/792/large/manmighty-protocol-rubicon-3.jpg?1691395898" alt="Heroes de Zeta Halo" />
                    <p>Heroes de Zeta Halo</p>
                </a>

                <a href="personal_naval.php" class="menu-item">
                    <img src="https://images.hdqwalls.com/wallpapers/halo-infinite-spartan-helmet-4k-uv.jpg" alt="Personal naval" />
                    <p>Personal naval</p>
                </a>

                <a href="personal_spartan3.php" class="menu-item">
                    <img src="https://c4.wallpaperflare.com/wallpaper/547/760/11/halo-spartans-xbox-video-game-art-halo-3-hd-wallpaper-preview.jpg" alt="Personal Spartan's 3" />
                    <p>Personal Spartan's 3</p>
                </a>

                <a href="inteligencias_artificiales.php" class="menu-item">
                    <img src="https://i.pinimg.com/736x/3a/86/8c/3a868ca225128c2a68e28d2f799fb09e.jpg" alt="Inteligencias Artificiales" />
                    <p>Inteligencias Artificiales</p>
                </a>

                <a href="operadores_especiales.php" class="menu-item"> 
                    <img src="https://images.squarespace-cdn.com/content/v1/58e1668c2e69cfd46ac3028a/1539278139141-R7QC2I88TOTFUUR8T9AW/Kilo-Five?format=1500w" alt="Operadores especiales" />
                    <p>Operadores especiales</p>
                </a>

                <a href="salvadores.php" class="menu-item">
                    <img src="https://s.yimg.com/ny/api/res/1.2/oZi5KAMMRQwDiVanOStCiA--/YXBwaWQ9aGlnaGxhbmRlcjt3PTk2MDtoPTQ4MA--/https://media.zenfs.com/es/levelup_525/5dca50538d0931582879600bb788d7a8" alt="Salvadores" />
                    <p>Salvadores</p>
                </a>
            </section>
        </main>
    </div>
</body>
</html>