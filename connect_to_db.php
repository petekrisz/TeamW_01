<?php
$servername = "localhost";
$username = "felhasznalo";
$password = "jelszo";
$dbname = "cukraszda_db";

// Kapcsolódás az adatbázishoz
$conn = new mysqli($servername, $username, $password, $dbname);

// Ellenőrzi a kapcsolatot
if ($conn->connect_error) {
    die("Sikertelen kapcsolódás: " . $conn->connect_error);
}
?>
