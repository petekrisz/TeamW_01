<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uzenet = $_POST["uzenet"];
    $cel_email = "szabopatrik0411@gmail.com"; // Cél e-amil

    // Elküldés
    mail($cel_email, "Kapcsolatfelvétel", $uzenet);
    echo "Az üzenet elküldve!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kapcsolatfelvétel</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<header id="header" class="conatiner-fluid">
        <h1><a href="index.html"><img src="images/SZPK_logo.webp" alt="SZPK"></a></h1>
        <nav>
            <ul>
                <li><a href="index.html">Kezdőlap</a></li>
                <li><a href="rólunk.html">Rólunk</a></li>
                <li><a href="Torták.html">Torták</a></li>
                <li><a href="feldolgozas.php">Megrendelés</a></li>
                <li><a href="kapcsoaltfeldolgozas.php">Kapcsolat</a></li>
                <li><a href="index.php" class="button">Regisztráció</a></li>
                <li><a href="bejelentkezés.php" class="button">Bejelentkezés</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <br>
    <h1>Kapcsolatfelvétel</h1>
    <br>
    <br>
    <form method="post" action="kapcsolatfeldolgozas.php">
        Üzenet: <textarea name="uzenet" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Küldés">
    </form>
</body>
</html>