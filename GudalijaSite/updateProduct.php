<?php
// updateProduct.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Users";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

if (isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['product_price'])) {
  $id = $_POST['product_id'];
  $name = $_POST['product_name'];
  $price = $_POST['product_price'];

  // Aktualizacja danych produktu w bazie danych
  $sql = "UPDATE products SET name = '$name', price = '$price' WHERE id = $id";
  if ($conn->query($sql) === TRUE) {
    echo "Produkt został zaktualizowany.";
  } else {
    echo "Błąd podczas aktualizacji produktu: " . $conn->error;
  }
}

$conn->close();
?>
