<?php
// deleteProduct.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Users";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Usunięcie produktu z bazy danych
  $sql = "DELETE FROM products WHERE id = $id";
  if ($conn->query($sql) === TRUE) {
    echo "Produkt został usunięty.";
  } else {
    echo "Błąd podczas usuwania produktu: " . $conn->error;
  }
}

$conn->close();
?>
