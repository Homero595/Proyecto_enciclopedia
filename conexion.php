<?php
$servername = "****.infinityfree.com";
$username = "*********";
$password = "************";
$dbname = "---_-------_---_----";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
