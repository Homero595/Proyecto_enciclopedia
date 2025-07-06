<?php
$servername = "sql206.infinityfree.com";
$username = "if0_38917772";
$password = "Amu7w6UeR7MlN";
$dbname = "if0_38917772_db_unsc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>