<?php
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //  $felhasznalo = $_POST["felhasznalo"];
  //  $jelszo = $_POST["jelszo"];

  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

// Csatlakozás létrehozása
$conn = new mysqli($servername, $username, $password, $dbname);

// Csatlakozás ellenőrzése
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Bejelentkezési adatok lekérdezése
$sql = "SELECT username, password FROM users WHERE username = ?"; // Felhasználónév lekérdezése
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_POST['username']); // 's' jelzi, hogy a paraméter egy string

$stmt->execute();

$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    if (password_verify($_POST['password'], $row['password'])) { // Jelszó ellenőrzése
        echo "Sikeres bejelentkezés!";
    } else {
        echo "Hibás jelszó!";
    }
}

$stmt->close();
$conn->close();



?>

<!DOCTYPE html>
<html>
<head>
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
<body>
    <header id="header" class="conatiner-fluid">
        <h1><a href="index.html"><img src="images/SZPK_logo.webp" alt="SZPK"></a></h1>
        <nav>
            <ul>
                <li><a href="index.html">Kezdőlap</a></li>
                <li><a href="rólunk.html">Rólunk</a></li>
                <li><a href="Torták.html">Torták</a></li>
                <li><a href="feldolgozas.php">Megrendelés</a></li>
                <li><a href="index.php" class="button">Regisztráció</a></li>
                <li><a href="bejelentkezés.php" class="button">Bejelentkezés</a></li>
                <div id="welcome">
        Üdvözöljük, <?php echo $username; ?>!
    </div>
            </ul>
        </nav>
    </header>
    <br>
    <br>
    <h1>Bejelentkezés</h1>
    <br>
    <form method="post" action="bejelentkezes.php">
        Felhasználónév: <input type="text" name="felhasznalo"><br>
        Jelszó: <input type="password" name="jelszo"><br>
        <input type="submit" value="Bejelentkezés">
    </form>
</body>
</html>
