<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $felhasznalo = $_POST["felhasznalo"];
    $jelszo = $_POST["jelszo"];

    // Ellenőrizd a felhasználó által megadott adatokat
    // Például ellenőrizd a jelszót, majd bejelentkezheted a felhasználót

    // Ide írd a bejelentkezési logikát
    // ...

    // Példa: átirányítás a főoldalra
    header("Location: index.php");
    exit;
}
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
            </ul>
        </nav>
    </header>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1>Bejelentkezés</h1>
    <form method="post" action="bejelentkezes.php">
        Felhasználónév: <input type="text" name="felhasznalo"><br>
        Jelszó: <input type="password" name="jelszo"><br>
        <input type="submit" value="Bejelentkezés">
    </form>
</body>
</html>
