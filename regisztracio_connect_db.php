<?php
$servername = "localhost";
$username = "adatbazis_felhasznalo";
$password = "adatbazis_jelszo";
$dbname = "regisztracio_db";

// Kapcsolódás az adatbázishoz
$conn = new mysqli($servername, $username, $password, $dbname);

// Ellenőrizd a kapcsolatot
if ($conn->connect_error) {
    die("Sikertelen kapcsolódás: " . $conn->connect_error);
}
?>
