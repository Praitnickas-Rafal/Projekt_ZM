<?php
// editProduct.php

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

  // Pobranie informacji o produkcie z bazy danych
  $sql = "SELECT * FROM products WHERE id = $id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Wyświetlenie formularza do edycji produktu
    echo "
    <form action='updateProduct.php' method='POST' id='updateProductForm'>
      <input type='hidden' name='product_id' value='" . $row['id'] . "'>
      
      <label for='product_name'>Nazwa produktu:</label>
      <input type='text' name='product_name' value='" . $row['name'] . "' required>
      
      <label for='product_price'>Cena produktu:</label>
      <input type='text' name='product_price' value='" . $row['price'] . "' required>
      
      <button type='submit' name='submit'>Zaktualizuj produkt</button>
    </form>
    ";

    // Dodanie skryptu JavaScript obsługującego alert i przekierowanie
    echo "
    <script>
      document.getElementById('updateProductForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Zapobieganie domyślnej akcji formularza

        // Wykonanie żądania AJAX do aktualizacji produktu
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'updateProduct.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            showAlert();
          }
        };
        xhr.send(new URLSearchParams(new FormData(document.getElementById('updateProductForm'))));

        // Funkcja wyświetlająca alert i przekierowująca
        var showAlert = function() {
          alert('Produkt został zaktualizowany.');
          window.location.href = 'adminpanel.php';
        };
      });
    </script>
    ";
  } else {
    echo "Nie znaleziono produktu o podanym identyfikatorze.";
  }
}

$conn->close();
?>
