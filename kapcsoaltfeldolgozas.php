<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uzenet = $_POST["uzenet"];
    $cel_email = "szabopatrik0411@gmail.com"; // Ide írd be az e-mail címet

    // Elküldés
    mail($cel_email, "Kapcsolatfelvétel", $uzenet);
    echo "Az üzenet elküldve!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kapcsolatfelvétel</title>
</head>
<body>
    <h1>Kapcsolatfelvétel</h1>
    <form method="post" action="kapcsolatfeldolgozas.php">
        Üzenet: <textarea name="uzenet" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Küldés">
    </form>
</body>
</html>