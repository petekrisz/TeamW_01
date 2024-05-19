<?php
$sql = "SELECT * FROM tortak";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Torta neve: " . $row["TortaNev"] . "<br>";
    }
} else {
    echo "Nincs találat.";
}

$conn->close();
?>
