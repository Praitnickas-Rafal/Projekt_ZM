<!DOCTYPE html>
<html>
<head>
  <title>Panel administratora</title>
  <style>
    /* Stylowanie tabeli */
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #f2f2f2;
    }
    /* Stylowanie kontenera listy */
    .list-container {
      max-height: 400px;
      overflow-y: auto;
    }
    #comments-table {
      width: 100%;
      border-collapse: collapse;
    }
    #comments-table td, #comments-table th {
      border: 1px solid black;
      padding: 8px;
    }
    .scrollable-table {
      height: 400px;
      overflow-y: scroll;
    }
  </style>
  <script>
    function deleteProduct(productId) {
      if (confirm("Czy na pewno chcesz usunąć ten produkt?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "deleteProduct.php?id=" + productId, true);
        xhr.onload = function() {
          if (xhr.status === 200) {
            var response = xhr.responseText;
            alert(response);
            setTimeout(function() {
              location.reload();
            }, 3000);
          } else {
            alert("Wystąpił błąd podczas usuwania produktu.");
          }
        };
        xhr.send();
      }
    }
  </script>
</head>
<body>
  <h1>Panel administratora</h1>
  
  <form action="addProductProcess.php" method="POST" enctype="multipart/form-data">
    <label for="product_name">Nazwa produktu:</label>
    <input type="text" name="product_name" id="product_name" required>
    
    <label for="product_price">Cena produktu:</label>
    <input type="text" name="product_price" id="product_price" required>
    
    <label for="product_image">Obrazek produktu:</label>
    <input type="file" name="product_image" id="product_image" required>
    
    <button type="submit" name="submit">Dodaj produkt</button>
  </form>
  
  <br>
  <br>
  
  <div class="list-container">
    <table>
      <tr>
        <th>ID</th>
        <th>Nazwa produktu</th>
        <th>Cena produktu</th>
        <th>Obrazek produktu</th>
        <th>Akcje</th>
      </tr>
      <?php
      // Pobierz produkty z bazy danych i wygeneruj wiersze tabeli
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "Users";

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['price'] . " zł</td>";
          echo "<td><img src='" . $row['image_path'] . "' alt='" . $row['name'] . "' width='80' height='80'></td>";
          echo "<td><a href='editProduct.php?id=" . $row['id'] . "'>Edytuj</a> | <a href='javascript:void(0)' onclick='deleteProduct(" . $row['id'] . ")'>Usuń</a></td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>Brak produktów w bazie danych.</td></tr>";
      }

      $conn->close();
      ?>
    </table>
  </div>
  <br>
  <br><br>
  <br>
  <h1>Feedback użytkowników</h1>

  <div class="scrollable-table">
    <table id="comments-table">
      <tr>
        <th>ID</th>
        <th>Użytkownik</th>
        <th>Opinia</th>
        <th>Komentarz</th>
        <th>Data dodania</th>
      </tr>
      <?php
      $servername = "localhost";
      $usernameDB = "root";
      $passwordDB = "";
      $dbname = "Users";

      $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
      if ($conn->connect_error) {
        die("Nieudane połączenie z bazą danych: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM comments ORDER BY date_added DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['feedback'] . "</td>";
          echo "<td>" . $row['comment'] . "</td>";
          echo "<td>" . $row['date_added'] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>Brak zgłoszonych komentarzy.</td></tr>";
      }

      $conn->close();
      ?>
    </table>
  </div>
</body>
</html>
