<?php
session_start();

// Beállítjuk a fejlécet
define('TITLE', 'Regisztráció');

// Kapcsolat az adatbázissal
$conn = mysqli_connect('localhost', 'root', '', 'registration');
if (!$conn) {
  die('A kapcsolat a MySQL-adatbázishoz nem sikerült: ' . mysqli_connect_error());
} else {
  // Ellenőrizzük a kapcsolatot
  if (mysqli_ping($conn)) {
    echo 'A kapcsolat sikeres!';
  } else {
    die('A kapcsolat a MySQL-adatbázishoz nem sikerült: ' . mysqli_error($conn));
  }
}

// Regisztrációs függvény
function registerUser($username, $password, $email, $conn) {
  // Ellenőrizzük, hogy a felhasználónév már nem szerepel az adatbázisban
  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    echo 'A felhasználónév már foglalt!';
    return;
  }

  // Hozzuk létre a felhasználót az adatbázisban
  $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
  mysqli_query($conn, $query);
  echo 'Sikeres regisztráció!';
}

// Regisztrációs form
if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  // Ellenőrizzük a felhasználónév és jelszó értékeit
  if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
    echo 'A felhasználónév csak kisbetűk, nagybetűk, számok és aláhúzás jelölők használatát engedélyezi.';
    return;
  }

  if (strlen($password) < 8) {
    echo 'A jelszó legalább 8 karakter hosszú kell legyen.';
    return;
  }

  registerUser($username, $password, $email, $conn);
}


// Form kiírása
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo TITLE; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"><meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <title>SZPK Cake Shop | Regisztráció</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/styles.css">
    
</head>
<body>
<header id="header">
            <h1><a href="index.html"><img src="images/SZPK_logo.webp" alt="SZPK"></a></h1>
            <nav>
                <ul>
                    <li><a href="index.html">Kezdőlap</a></li>
                    <li><a href="rólunk.html">Rólunk</a></li>
                    <li><a href="Torták.html">Torták</a></li>
                    <li><a href="Megrendelés.html">Megrendelés</a></li>
                    <li><a href="index.php" class="button">Regisztráció</a></li>
                </ul>
            </nav>
        </header>
    <main>
        <div id="background"> 
            <section id="regisztracio" class="conatiner-fluid col-lg-5 col-sm-8 col-xs-12">
                <h2>Registration</h2>
                    <p>Regisztrálj velünk!</p>
                    <p>Ne feledj megadni a szükséges adatokat!</p>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="username">Felhasználónév:</label>
    <input type="text" name="username" required><br><br>
    <label for="password">Jelszó:</label>
    <input type="password" name="password" required><br><br>
    <label for="email">Email-cím:</label>
    <input type="email" name="email" required><br><br>
    <input type="submit" name="register" value="Regisztráció">
  </form>
            </section>
        </div>
      </main>
</body>
</html>