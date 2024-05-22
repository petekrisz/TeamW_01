<?php
// Beállítjuk a MySQL adatbázis kapcsolatot
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tortarendelesek_db';

// létrehozzuk a kapcsolatot
$conn = new mysqli($host, $username, $password, $dbname);

// Ellenőrizzük, hogy sikerült-e a kapcsolat
if ($conn->connect_error) {
    die("Kapcsolati probléma: " . $conn->connect_error);
}

// Ha a formot beküldték, akkor tároljuk az adatokat
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Felveszünk a beküldött adatokat a változókba
    $torta = $_POST['torta'];
    $datum = $_POST['datum'];
    $komment = $_POST['komment'];

    // Tároljuk az adatokat az adatbázisban
    $sql = "INSERT INTO tortarendelesek (nev, megrendeles_datuma, komment) VALUES ('$torta', '$datum', '$komment')";
    if ($conn->query($sql) === TRUE) {
        echo "Az adatok sikeresen eltárolva!";
    } else {
        echo "Hiba történt: " . $sql . "<br>" . $conn->error;
    }
}

// Megjelenítjük a formot
?>
<!DOCTYPE html>
<html>
    <head>
    
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"><meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <title>SZPK Cake Shop | Megrendelés</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                    <li><a href="Megrendelés.html">Megrendelés</a></li>
                    <li><a href="regisztrácio.html" class="button">Regisztráció</a></li>
                </ul>
            </nav>
        </header>
    <main>
        
        <div id="background"> 
            <section id="megrendeles" class="conatiner-fluid col-lg-7 col-sm-9 col-xs-12">
                <h2>Order</h2>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <select id="torta" name="torta">
        <option value="null"> - Torták - </option>
        <option value="BOCI">Boci torta (9 000 Ft)</option>
        <option value="PUNCS">Puncstorta (10 000 Ft)</option>
        <option value="OROSZ">Oroszkrém torta (11 500 Ft)</option>
        <option value="BAILEYS">Baileys torta (13 500 Ft)</option>
        <option value="BARACK">Barackos túrótorta (13 000 Ft)</option>
        <option value="VOROS">Vörös bársony torta (12 000 Ft)</option>
        <option value="KINDER">Kinder Maxiking (11 000 Ft)</option>
        <option value="FEKETE_ERDO">Fekete Erdő torta (11 500 Ft)</option>
        <option value="SZABOLCSI">Szabolcsi Almás Mákos (14 000 Ft)</option>
        <option value="SACHER">Sacher torta (13 500 Ft)</option>
        <option value="GYEREK12">Gyerektorta (12 szeletes) (8 000 Ft)</option>
        <option value="GYEREK16">Gyerektorta (16 szeletes) (10 000 Ft)</option>
        <option value="ALOM">Álomtorta (Egyesztetés szerinti áron)</option>
    </select>
    <label for="datum">Megrendelés dátuma:</label>
    <input type="date" id="datum" name="datum"><br>
    <textarea name="komment" id="komment" placeholder="Ide írhatja megjegyzését, ill. az Álomtortára vonatkozó kívánságait"></textarea><br>
    <input type="submit" value="Küldés">
</form><br>

                <p>Ha megrendelést helyez el, rövidesen visszajelezünk!</p>
                <p>Ha bármilyen kérdése vagy probléma van, forduljon hozzánk!</p>
                <img src="images/team.svg" alt="Rólunk" height="30px"> <br>
                <a href="rólunk.html">About Us</a>
            </section>
        </div>
        
      </main>

      <script src="script.js"></script>



      
    </body>

  </html>


<?php
// Zárjuk be az adatbázis kapcsolatát
$conn->close();
?>