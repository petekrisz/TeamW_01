<?php
session_start();

// Beállítjuk a fejlécet
define('TITLE', 'Bejelentkezés');

// Kapcsolat az adatbázissal
$conn = mysqli_connect('localhost', 'username', 'password', 'registration');
if (!$conn) {
  die('A kapcsolat a MySQL-adatbázishoz nem sikerült: ' . mysqli_connect_error());
}

// Bejelentkezési függvény
function login($username, $password) {
  // Keresünk a felhasználó az adatbázisban
  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      // Sikeres bejelentkezés
      $_SESSION['username'] = $username;
      header('Location: index.php');
      exit;
    } else {
      echo 'Hibás jelszó!';
    }
  } else {
    echo 'Nincs felhasználó az adatbázisban!';
  }
}

// Bejelentkezési form
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  login($username, $password);
}

// Form kiírása
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo TITLE; ?></title>
</head>
<body>
  <h1>Bejelentkezés</h1>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="username">Felhasználónév:</label>
    <input type="text" name="username" required><br><br>
    <label for="password">Jelszó:</label>
    <input type="password" name="password" required><br><br>
    <input type="submit" name="login" value="Bejelentkezés">
  </form>
</body>
</html>