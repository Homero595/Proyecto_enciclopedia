-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql206.infinityfree.com
-- Tiempo de generación: 08-07-2025 a las 20:57:53
-- Versión del servidor: 11.4.7-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `if0_38917772_db_unsc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `InteligenciasArtificiales`
--

CREATE TABLE `InteligenciasArtificiales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `numero_servicio` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `funcion_principal` text DEFAULT NULL,
  `sitio_activacion` varchar(100) DEFAULT NULL,
  `fecha_activacion` date DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `InteligenciasArtificiales`
--

INSERT INTO `InteligenciasArtificiales` (`id`, `nombre`, `numero_servicio`, `avatar`, `funcion_principal`, `sitio_activacion`, `fecha_activacion`, `descripcion`, `imagen`, `categoria`) VALUES
(1, 'Cortana', 'CTN 0452-9', 'Doctora Halsey', 'Software de infiltración', 'Reach', '2549-11-07', 'Cortana, una IA libre y volitiva, diseñada originalmente por la Dra. Catherine Halsey, representa la notable combinación de una programación de intrusión de software extremadamente avanzada con el carisma, la empatía y las ventajas antropomórficas de una personalidad humana. Mordaz, ingeniosa y segura de sus capacidades únicas, Cortana sirvió junto a John-117 en las últimas semanas de la Guerra del Covenant, durante el crucial Evento Halo que finalmente provocó el fin del conflicto\r\n\r\nEl avatar holográfico elegido por Cortana es el de una mujer de piel azul, cubierta de símbolos de datos que se desplazan. La selección de este avatar no fue arbitraria, ya que se parece mucho a una joven Halsey, quien creó en secreto la IA utilizando la plantilla neuronal de su propio cerebro, obtenida mediante procedimientos ilegales de clonación flash. Si bien esta metodología fue extremadamente controvertida para quienes la conocían, la mente de Halsey es una de las razones por las que Cortana fue la IA más poderosa jamás desarrollada por la humanidad. Capaz de transferir su personalidad central a cualquier sistema informático de suficiente complejidad y potencia de procesamiento, teóricamente tenía acceso a recursos ilimitados. Sin embargo, como todas las demás IA inteligentes, la vida de Cortana estaba regida por un parámetro de siete años, al final del cual tendría que ser eliminada para evitar un descenso inevitable a la caótica locura de la desenfreno.', 'https://i.pinimg.com/736x/ac/3f/12/ac3f12acc6c4270794298b82b7a09e6f.jpg', 'Jefe Maestro y Cortana'),
(2, 'Isabel', 'ISA 1307-2', 'Operadora Logistica ', 'Logistica, Diseño industrial', '[Desconocido]', '2556-03-18', 'Isabel es una IA inteligente de quinta generación que actualmente administra las operaciones a bordo del UNSC Spirit of Fire. Originalmente fue asignada al Puesto de Investigación Henry Lamb para ayudar en el trabajo del investigador en la construcción extragaláctica conocida como el Arca, pero esto se vio interrumpido por el cierre inesperado del portal a la Tierra y el repentino y violento asalto de los Desterrados. Ahora se le ha dado la oportunidad de contraatacar a este nuevo enemigo con el control de las vastas reservas de material militar y potencial del Spirit of Fire, aunque queda por ver si puede concentrar su venganza de forma productiva. A pesar de esta incertidumbre, su actuación a bordo del Spirit of Fire ha sido nada menos que espectacular; su cuidadosa planificación y sus habilidades incluso llevaron a un asalto decisivo a la nave insignia de los Desterrados, Enduring Conviction.', 'https://www.pcgamesn.com/wp-content/sites/pcgamesn/legacy/isabel-halo-wars-2-550x309.jpg', 'Spirit of fire'),
(3, 'Serina ', 'SNA 1292-4', 'Directora de nave', 'Planificación de operaciones, cientifica', '[Desconocido]', '2530-01-07', 'Una IA inteligente de tercera generación asignada al Spirit of Fire poco después de su creación, Serina administró el despliegue de fuerzas en la superficie de Harvest y dirigió con éxito campañas posteriores tanto en Arcadia como en un misterioso mundo artificial conocido como Trove. Fue en esta instalación donde Serina realizó el primer análisis detallado del Flood en la historia del UNSC, aunque sus informes nunca llegaron a la Tierra. Mientras el Spirit of Fire estaba varado en el espacio profundo, Serina inició la dispensación final con la ayuda del profesor Anders, ansiosa por evitar cualquier efecto catastrófico de su propia desenfreno. Incluso después de su partida, el legado de Serina a bordo del Spirit of Fire está innegablemente presente, habiendo iniciado silenciosamente sus fábricas de producción durante el largo criosueño de la tripulación, un acto fundamental que proporcionó las enormes reservas de activos militares que eventualmente necesitarían para enfrentarse a la amenaza de los Desterrados', 'https://assets.mycast.io/characters/serina-7287244-normal.jpg?1656973140', 'Spirit of fire ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

CREATE TABLE `personajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `numero_servicio` varchar(50) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `mundo_nacimiento` varchar(100) DEFAULT NULL,
  `rango` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `descripcion` mediumtext DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`id`, `nombre`, `numero_servicio`, `altura`, `peso`, `mundo_nacimiento`, `rango`, `fecha_nacimiento`, `descripcion`, `imagen`, `categoria`) VALUES
(1, 'John-117', 'S-117', 218, '130.00', ' Eridanus II', ' Master Chief Petty Officer', '2511-03-07', 'Considerado por la mayoría como una leyenda viviente, el Jefe Maestro fue el individuo más importante durante la Guerra del Covenant, no solo porque jugó un papel decisivo en el final del conflicto, sino porque encarnaba un símbolo de esperanza inquebrantable en la hora más oscura de la humanidad. Estoico, impávido, profesional e intensamente concentrado en la tarea en cuestión, este espartano inspiraba asombro como un héroe mitológico de la historia antigua, pero con la presencia formativa de un tanque blindado\r\n\r\nSi bien es competente en todos los aspectos de las tácticas de infantería, así como en los fundamentos del combate aeroespacial de gravedad variable, una de las habilidades más notables de John-117 es el liderazgo: su capacidad para dirigir eficazmente destacamentos operativos que varían en tamaño, desde equipos de fuego hasta batallones completos. Hacia el final de la guerra, el personal del UNSC en todos los niveles generalmente se sometió a la experiencia y el intelecto estratégico de John-117, lo que le otorgó un nivel de autoridad que superó con creces su rango real. A menudo lidera el Equipo Azul, un equipo de ataque espartano que ha existido de una forma u otra desde los primeros días de la Guerra del Covenant\r\n\r\nComo soldado de pocas palabras, la preferencia del Jefe Maestro por la acción sobre el discurso a veces se considera imprudente, aunque esto es tanto producto de su determinación pura como una faceta del adoctrinamiento y entrenamiento de los SPARTAN-II. John-117 prioriza la misión por encima de todo. Aunque es muy protector con sus compañeros Spartans, es muy consciente de la necesidad de defender a la humanidad, sin importar el costo. Ha elegido aceptar este sacrificio y no espera menos de quienes sirven con él. A lo largo de su extensa carrera militar, John-117 ha logrado numerosas hazañas y ha demostrado un coraje inquebrantable que es nada menos que extraordinario. Sin embargo, largos años de guerra le han dado al Spartan un modo de pensar sombrío y serio, pero no han quebrado su resiliencia ni debilitado su compromiso de luchar por aquellos que no pueden luchar por sí mismos', 'https://upload.wikimedia.org/wikipedia/en/4/42/Master_chief_halo_infinite.png', 'Jefe Maestro y Cortana'),
(2, 'Jacob Keyes', '01928-19912-JK', 194, '96.20', 'Tierra', 'Capitán', '2495-02-08', 'Audaz, valiente e impulsado por el deber, Jacob Keyes fue un consumado comandante naval, que no solo participó en muchas batallas críticas a lo largo de la Guerra del Covenant, sino que también sirvió como profesor experimentado en la academia naval de Luna. Al principio de su carrera, una misión clasificada de la ONI con la Dra. Halsey resultó en una breve pero tempestuosa relación y en una hija, Miranda, aunque permanecerían distanciados en los años siguientes. En el último año de la guerra, Keyes jugó un papel importante en las batallas de Sigma Octanus IV y Reach, pero finalmente se vio obligado a llevar la UNSC Pillar of Autumn a Halo. Allí luchó junto al Jefe Maestro contra el Covenant para ayudar a asegurar el mundo anillo, aunque finalmente encontró su fin en las garras del Flood. A pesar de su trágico destino, Keyes dejó un legado perdurable en el corazón de su hija, quien se convirtió en una heroína fundamental en los últimos días de la guerra.', 'https://pm1.aminoapps.com/6454/658cb6d8824333304f98f82ddf9eeb00aaafda60_hq.jpg', 'Figuras notables'),
(3, 'Doctora Halsey', 'CC-409871', 170, '53.00', 'Endymion', 'Contratista Civíl', '2492-03-19', 'Contratada por la Oficina de Inteligencia Naval cuando era una joven prodigio, Catherine Halsey encabezó los proyectos ultrasecretos SPARTAN-II y MJOLNIR, así como la creación de Cortana. A pesar de la inmensa deuda moral contraída, estas acciones sirvieron finalmente para poner fin a la guerra con el Covenant, convirtiéndola en una de las figuras más importantes del siglo XXVI. Aunque su actitud a menudo se titula de arrogante, insensible y cruel, en privado alberga profundos arrepentimientos por el programa SPARTAN-II e intenta encontrar consuelo en el éxito objetivo del proyecto: la supervivencia de la humanidad. Externamente, tales luchas están bien ocultas bajo una pesada capa de autocomplacencia de que «el fin justifica los medios». El extenso conocimiento tecnológico y antropológico que ha acumulado tanto del Covenant como de los Forerunner la ha colocado invariablemente en varias coyunturas críticas en el desarrollo de la humanidad. Fue indispensable para el asalto de Infinity a Zeta Halo, con el fin de detener a la misma Al que creó para salvar a la humanidad', 'https://pm1.aminoapps.com/6912/9e29053ffd9bc67a972c9a34cf53ebaa0245497br1-600-493v2_hq.jpg', 'Figuras notables'),
(4, 'Comandante Miranda Keyes', '15972-19891-MK', 178, '68.50', 'Luna', 'Comandante', '2525-02-28', 'Desafiando a todos los escépticos al negarse a vivir a la sombra de su padre, Miranda Keyes fue una magistral comandante y estratega naval por derecho propio. A pesar de una estrecha relación con su padre, la carrera militar de Keyes no fue fácil, y fue constantemente acosada por acusaciones de nepotismo. Durante los enfrentamientos finales de la Guerra del Covenant, Keyes persiguió dos veces a las fuerzas del Covenant al desliespacio desde la Tierra. A pesar de luchar valientemente directamente contra el Covenant en numerosas batallas durante su carrera militar, finalmente fue asesinada por el Profeta de la Verdad, sacrificando su vida para salvar a un compañero soldado. Las acciones desinteresadas de Keyes contribuirían en última instancia a la victoria del UNSC contra el Covenant, asegurando un legado duradero propio.', 'https://i.namu.wiki/i/7xSCqaVfrbA4RrNsjJxFhFSVbPeKMZz7W_BRFT5RUZsd2VK8F7l6YDsM9PxFVZaKfD-J3ydP2Msb1_n74GIr_zTIKXWQEVRFMkHbZWATg5tTspf72kpXwlURkncj7DCtYg8Wo25aGDYY00GlCBzWrM5NWEOT6oytHrrzDvdzCGU.webp', 'Figuras notables'),
(5, 'Sargento Mayor Johnson', '48789-20114-AJ', 187, '95.50', 'Tierra', 'Sargento Mayor', '2474-11-23', 'Avery Johnson, un veterano experimentado y curtido en la batalla del Cuerpo de Marines del UNSC, ha acumulado décadas de experiencia en combate tanto contra las fuerzas insurrectas humanas como contra el Covenant. A pesar de su actitud arrogante y su enfoque brusco y sensato del liderazgo, la lealtad de Johnson a la misión del UNSC y a la supervivencia de la humanidad significó que a menudo estuvo en el meollo de la acción, desempeñando un papel fundamental a lo largo de los conflictos del siglo XXVI. Su excepcional desempeño en el Cuerpo de Marines lo llevó a ser reclutado en el Proyecto: ORION, donde fue desplegado en operaciones clasificadas contra rebeldes humanos. Johnson finalmente sacrificó su vida, intentando disparar tácticamente Halo y detener el brote del Flood en el Arca, contribuyendo valientemente a la supervivencia de la humanidad al final de la Guerra del Covenant.', 'https://pm1.aminoapps.com/6350/ba664d18c369c0ce460887fe7c65914705407002_hq.jpg', 'Figuras notables'),
(6, 'Fernando Esparza ECHO-216', 'CC-434323', 180, '86.20', 'Charybdis IX', 'Contratista Civíl', '2518-05-07', 'Fernando Esparza formó parte del esfuerzo del UNSC para atacar la presencia de Cortana en Zeta Halo. Cuando los Desterrados emboscaron repentinamente a sus fuerzas y comenzaron a diezmarlas en número, Esparza permitió que el miedo superara al deber, comandando un Pelican para escapar. Esto resultó infructuoso y, mientras estaba a la deriva en el espacio, toda esperanza parecía perdida hasta que se topó con una señal que lo condujo hasta el Jefe Maestro. Inicialmente impulsado por el miedo y la necesidad de priorizar su supervivencia por encima de todo, Esparza descubrió un nuevo coraje mientras luchaba junto al Spartan en Zeta Halo. Durante su misión, fue capturado por el asesino de los Desterrados Jega \'Rdomnal y torturado dentro de la propia fortaleza de Escharum. A pesar de todo lo que soportó, Esparza resistió lo suficiente para ser rescatado y ahora se encuentra con orgullo junto al Jefe Maestro, ansioso por enfrentar nuevas amenazas y desafíos', 'https://i.namu.wiki/i/7xSCqaVfrbA4RrNsjJxFhBBd18punhCNf2fUaM1iRsXYrUd63tbPgCVxhJvqH4xzN6VW_h8TBganStfV48yLb-ztkiTTZAf95ctFrpk7yhwM-9IIikd-HHJM91B1nXXVfH0DLnMHQQCldm0g14YKp7hsLre1OOl3EuayTPzfJNY.webp', 'Figuras notables'),
(7, 'Frederic Ellsworth', 'S-104', 216, '132.00', 'Ballast', 'Teniente, Grado Junior', '2511-04-03', 'Con un repertorio notablemente competente y variado, la habilidad más impresionante de Fred-104 son las tácticas de campo de batalla, lo que le permite operar como líder del Equipo Azul cuando John-117 no está presente. Aunque normalmente mantiene una franqueza informal y seca en la mayoría de sus interacciones, como líder del equipo es austero, clínico y, a menudo, propenso a la reflexión, agobiado por la responsabilidad del rol. A pesar de ello, el verdadero genio de Fred reside en la estrategia, la rápida toma de decisiones y una capacidad natural para forjar elementos de combate dispares en una fuerza de guerra cohesionada, incluso cuando se presentan circunstancias complejas y extremas. Esto se hizo evidente en su liderazgo de los Spartan-III durante el prolongado Conflicto Ónice y una serie de enfrentamientos en la colonia de Gao, pero de manera más significativa cuando lideró valientemente a muchos de los últimos Spartan-II supervivientes en la defensa de Reach.', 'https://www.405th.com/forums/attachments/tumblr_58149278449487af93f91c757f2704ef_0c266155_540-jpg.320744/', 'Equipo azul'),
(8, 'Linda Pravon ', 'S-058', 213, '110.00', 'Verent', 'Suboficial, Primera Clase', '2511-03-19', 'Empleada a menudo como francotiradora exploradora que proporciona apoyo de combate y reconocimiento de largo alcance, las capacidades de Linda-058 son incomparables dentro del programa SPARTAN-II. A pesar de tener un semblante frío y moderado, Linda es extraordinariamente rápida en la evaluación y respuesta estratégica. Su lado independiente y su confianza inquebrantable en su habilidad y entrenamiento significaron que podía ser desplegada eficazmente durante largos períodos de tiempo en misiones de \"lobo solitario\", operando profundamente tras las líneas enemigas. Prefiere una SRS99-S5 modificada, cariñosamente llamada \"Nornfang\", una combinación que la hace prácticamente incomparable en el campo de batalla, y es considerada una de las francotiradoras más talentosas del UNSC. La habilidad de Linda ha demostrado ser invaluable, ya que las directivas de misión a menudo la enfrentan a objetivos de alta prioridad a distancias extremas o le encargan la tarea de proporcionar apoyo de vigilancia a los aliados en condiciones tácticas excepcionalmente desafiantes', 'https://preview.redd.it/spartan-ii-linda-058-in-destiny-2-v0-bxm51touvibb1.jpg?width=640&crop=smart&auto=webp&s=5b9b38475dac6df02d0250fcc3a6c08bb1d10fce', 'Equipo azul'),
(9, 'Kelly Shadoock', 'S-087', 211, '112.00', 'Imber', 'Suboficial, Primera Clase', '2510-09-21', 'Excepcionalmente talentosa tanto en reconocimiento como en combate cuerpo a cuerpo, Kelly-087 poseía reflejos y velocidad notables incluso antes de su aumento biológico y el uso de los sistemas de amplificación Mjolnir. Con su armadura puesta, es capaz de correr a velocidades de aproximadamente 65 km/h durante períodos prolongados, lo que la convierte en una exploradora excepcional y una estratega de ataques relámpago. Aunque cáustica, cínica e incluso insubordinada a veces, la determinación y lealtad de Kelly al Equipo Azul son incuestionables. Está orientada a las tareas y es competitiva, ansiosa por hacer lo que sea necesario para cumplir una misión, incluso a un gran coste para ella misma. Experta en muchas armas, el arsenal preferido de Kelly para combates a corta distancia es siempre la «Oathsworn», una escopeta M45 altamente personalizada con una reputación letal. Las asombrosas habilidades de Kelly exhiben todas las cualidades que han llevado al renombre del Equipo Azul.', 'https://i.namu.wiki/i/7xSCqaVfrbA4RrNsjJxFhHfjZ0BH2Ly-ivxha-y09PpOhJS1Sj0SvCAOlh0tbAoZJt1GRYUb7V10BLz1HaSC32_qwdgOgDbB340D3TQTxNU8K1NuHvRoqReWomVZIVvPuKLYlJn7tQMS6eeBAsqivX-TQFYGx2slvwje515cgj4.webp', 'Equipo azul'),
(10, 'Samuel westergaard', 'S-034', 223, '135.00', 'Harvest', 'Suboficial, Segunda Clase', '2511-07-10', 'Un miembro original y fundamental del Equipo Azul, Samuel-034 es un nombre recordado y honrado por todos los Spartans, independientemente de su clase o generación. A pesar de ser el miembro más joven del Equipo Azul, Sam era conocido por su formidable tamaño y fuerza, incluso antes de la mejora. Uno de los compañeros más cercanos de John-117 en el programa SPARTAN-II, el vínculo que forjaron fue el centro de la lealtad y el corazón del Equipo Azul. Cuando los candidatos a Spartan-II fueron enviados a Chi Ceti IV para recuperar la primera línea de armadura Mjolnir, se vieron obligados a abordar una nave de guerra Covenant para evitar un ataque a las instalaciones. Después de sufrir una brecha en su armadura que le impediría salir al espacio, Samuel-034 sacrificaría su propia vida para salvar a su equipo y destruir la nave enemiga. Este valiente acto sirvió para inspirar y galvanizar a sus compañeros Spartans mientras se enfrentaban a la implacable amenaza alienígena durante los treinta años siguientes.', 'https://cdn.personalitylist.com/avatars/434286.png', 'Equipo azul'),
(11, 'Capitán James Cutter', '01730-58392-JC', 185, '88.50', 'Reach', 'Capitán', '2478-05-12', 'James Cutter es un héroe muy estimado de la Armada del UNSC, que sirvió valientemente en el frente durante la insurrección y la Guerra del Covenant\r\n\r\nUn misterio descubierto durante la Batalla de la Cosecha envió al Spirit of Fire lejos del espacio humano. Desde allí, Cutter lideró sin miedo a la tripulación de la nave contra el Covenant, los Desterrados e incluso el Flood, abarcando un enigmático mundo escudo Forerunner y la instalación extragaláctica del Arca. Firmes e inquebrantables, Cutter y lo que queda de las fuerzas del Spirit of Fire.\r\n\r\nhan vuelto a centrar su atención en detener al contingente restante de los Desterrados y encontrar el camino a casa.', 'https://pm1.aminoapps.com/7332/a54716ca136e94bce4509c81384259731aba0b8cr1-1146-816v2_hq.jpg', 'Spirit of fire'),
(12, 'Profesora Ellen Anders', 'CC-500493', 178, '51.70', 'Arcadia', 'Contratista Civíl', '2503-08-13', 'Consultora civil de la ONI con experiencia en ecopoiesiología, exobiología y xenobiología teórica. Ellen Anders desempeñó un papel importante durante las misiones del Spirit of Fire a través de colonias humanas y antiguos mundos Forerunner. La naturaleza impetuosa de la profesora y su fuerte preferencia por la acción y el descubrimiento sobre la precaución contradicen su rico conocimiento y experiencia en investigación, todo lo cual resultó fundamental no solo para proteger a la tripulación del Spirit, sino a toda la humanidad. Durante su batalla contra los Desterrados, Anders logró desplegar una instalación de Halo recién creada desde la fundición del Arca, pero fue detenida por uno de los Guardianes de Cortana cuando intentaba traerla de vuelta al espacio humano.', 'https://production-gameflipusercontent.fingershock.com/us-east-1:900b2748-8a89-4454-a265-010509a4febf/f4e72ff6-ac1f-459e-9412-de7263b9a701/0d4ff714-9209-4c37-9eb8-be06a5e7fd1f', 'Spirit of fire'),
(13, 'Sargento John Forge ', '63492-94758-JF', 191, '97.50', 'Tierra', 'Sargento', '2501-05-29', 'Parte del despliegue de los Marines en el UNSC Spirit of Fire durante su campaña en Harvest, John Forge era conocido principalmente por su pintoresco pasado, su actitud poco profesional y su historial de insubordinación. A pesar de estas facetas negativas, el Capitán Cutter vio el verdadero valor que poseía Forge, principalmente en su coraje puro y su negativa a rendirse sin importar el costo. Con permiso para ejercer una autoridad que excedía su rango formal, Forge lideró desde el frente, inspirando a aquellos a su cargo con coraje sacrificatorio. Su acto final no sería diferente, dando su vida para negar al Covenant el acceso a una flota Forerunner imparable', 'https://pm1.aminoapps.com/6263/a854440a182b1b938634deec128cb6c6ef4f6a37_hq.jpg', 'Spirit of fire'),
(14, 'Jerome Cable', 'S-092', 219, '131.50', 'Minister', 'Comandante (Brevet Comission)', '2511-05-08', 'Nacido del proyecto SPARTAN-II y líder del destacamento del Equipo Rojo que fue recuperado por el Spirit of Fire en Arcadia, Jerome-092 ha luchado junto a Douglas-042 y Alice-130 durante la mayor parte de su carrera. En los primeros cinco años de la guerra, el Equipo Rojo superó a la mayoría de los demás elementos de combate terrestre, mientras se movían de un mundo a otro, intentando detener la amarga masacre del Covenant en las Colonias Exteriores. Después de integrarse con la tripulación del Spirit, Jerome lideró al Equipo Rojo contra las fuerzas del Covenant y de los Desterrados, con el objetivo de evitar que tomaran el control de las poderosas y antiguas armas dejadas por los Forerunners. Mientras la batalla contra los Desterrados continúa rugiendo en la superficie del Arca, la firme determinación y el liderazgo inquebrantable de Jerome se han convertido en la base sobre la que luchan las fuerzas terrestres del Spirit.', 'https://pm1.aminoapps.com/7950/dc295065a44f12579d90da1dd9a121b429e57345r1-426-426v2_hq.jpg', 'Spirit of fire');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `InteligenciasArtificiales`
--
ALTER TABLE `InteligenciasArtificiales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `InteligenciasArtificiales`
--
ALTER TABLE `InteligenciasArtificiales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personajes`
--
ALTER TABLE `personajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
