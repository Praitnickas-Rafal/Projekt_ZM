<?php
// Sprawdź, czy formularz został przesłany
if (isset($_POST['submit'])) {
  // Pobierz dane z formularza
  $productName = $_POST['product_name'];
  $productPrice = $_POST['product_price'];

  // Convertas file i imgą ->
  $targetDir = "../products"; // Galima rasyti nevisa pavadinima tipo /Folder/Folder/File.php gali nauduoti ../, bash pakartuok
  // Sitame kataloge bus uzrasomas produktai, pas tave irgi galima buvo, bet praktikoje geriau taip nauduoti
  $targetFile = $targetDir . basename($_FILES['product_image']['name']);
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  //$_FILES i pathinfo funkcijas paskaityk geriau, gptchat i pagalba

  // Sprawdź, czy przesłany plik jest obrazkiem
  $isValidImage = getimagesize($_FILES['product_image']['tmp_name']);
  if ($isValidImage !== false) {
    // Przesłany plik jest obrazkiem, kontynuuj przetwarzanie
    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $targetFile)) {
      // Plik obrazka został pomyślnie przesłany i zapisany

      // Zapisz informacje o produkcie w bazie danych
      $servername = "localhost"; 
      $username = "root"; 
      $password = ""; 
      $dbname = "Users"; 

      // Prisijungimas perdariau, turetu +/- tai atrodyti ->
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
      }
      //Visada Turetum patikrinti, ar esi prisijunges DB, jeigu nauduoji mqslqi

      // Przygotuj zapytanie do wstawienia danych
      $sql = "INSERT INTO products (name, price, image_path)
              VALUES ('$productName', '$productPrice', '$targetFile')";

if ($conn->query($sql) === TRUE) {
  //Jeigu viskas gerai, tai product add ->
  echo "<script>alert('Produkt został dodany pomyślnie.');</script>";
  echo "<script>setTimeout(function(){ window.location.href = 'adminpanel.php'; }, 1000);</script>";
} else {
  // Wystąpił problem podczas dodawania produktu do bazy danych
  echo "<script>alert('Błąd dodawania produktu: " . $conn->error . "');</script>";
}


      // Rafal Nepamirsk uzdarineti DB
      $conn->close();
    } else {
      // Wystąpił problem podczas zapisywania pliku obrazka
      echo "Wystąpił problem podczas przesyłania pliku obrazka.";
    }
  } else {
    // Przesłany plik nie jest obrazkiem
    echo "Przesłany plik nie jest obrazkiem.";
  }
}
?>
