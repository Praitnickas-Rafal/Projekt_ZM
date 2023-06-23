<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/GudalijaSite/Style&IMG/styles.css" />
    <title>TARTAK | GUDALIJA</title>
  </head>
  <body>
    <div class="section__container logo__header">
      <img src="/GudalijaSite/Style&IMG/assets/logoGudaliji.png" alt="logo" />
      <div class="contact__us">
        <p><i class="ri-mail-fill"></i> info@gudalija.com</p>
        <p><i class="ri-phone-fill"></i> +370 000 1541</p>
      </div>
    </div>
    <nav>
      <div class="section__container nav__links">
        <span><a href="#">HOME</a></span>
        <span><a href="#">ONAS</a></span>
        <span><a href="#">DESKI BUDOWLANE</a></span>
        <span><a href="#">DESKI PODŁOGOWE</a></span>
        <span><a href="#">DESKI TERASOWE</a></span>
        <span><a href="#">DESKI ELEWACYJNE</a></span>
        <a href="/GudalijaSite/SystemLogowanie/sign-up.php">
        <button>Zarejestruj się</button>
        </a>
        <a href="/GudalijaSite/SystemLogowanie/sign-in.php">
        <button>Zaloguj się</button>
        </a>
        <span>
          <a href="/GudalijaSite/SystemLogowanie/sign-in.php">
            <i class="ri-shopping-cart-2-line"></i>
          </a>
        </span>
      </div>
    </nav>
    <header>
      <div class="section__container header__container">
        <p>Wszystko dla budowy</p>
        <h1>GUDALIJA Product</h1>
        <a href="/GudalijaSite/SystemLogowanie/sign-in.php">
        <button class="btn">SHOP NOW</button>
        </a>
      </div>
    </header>
    <section class="banner__1">
      <div class="section__container banner__1__container">
        <div class="icon">
          <img src="/GudalijaSite/Style&IMG/assets/m1.png" alt="icon" />
          <span>Impregnacja drewna</span>
        </div>
        <div class="icon">
          <img src="/GudalijaSite/Style&IMG/assets/m2.png" alt="icon" />
          <span>Różny wymiary</span>
        </div>
        <div class="icon">
          <img src="/GudalijaSite/Style&IMG/assets/m3.png" alt="icon" />
          <span>Projekty domów</span>
        </div>
        <div class="icon">
          <img src="/GudalijaSite/Style&IMG/assets/m4.png" alt="icon" />
          <span>Jakość</span>
        </div>
        <div class="icon">
          <img src="/GudalijaSite/Style&IMG/assets/m5.png" alt="icon" />
          <span>Szybkość</span>
        </div>
        <div class="icon">
          <img src="/GudalijaSite/Style&IMG/assets/m6.png" alt="icon" />
          <span>Kwalifikowani pracownicy</span>
        </div>
      </div>
    </section>

    <section class="arrivals">
      <div class="section__container arrivals__container">
        <div class="section__header">
          <h3 class="section__title">ASORTYMENT NASZEJ PRODUKCJI</h3>
          <div class="arrivals__nav">
            <span>INNE</span>
            <span>BUDOWLANE</span>
            <span>PUDŁOGOWE</span>
            <span>TERASOWE</span>
            <span>ELEWACYJNE</span>
          </div>
        </div>
        <div class="arrivals__grid">
          <div class="arrivals__image">
            <img src="/GudalijaSite/Style&IMG/assets/arrivals9.jpg" alt="arrivals" />
          </div>
          <div class="arrivals__image">
            <img src="/GudalijaSite/Style&IMG/assets/arrivals5.jpg" alt="arrivals" />
          </div>
          <div class="arrivals__image">
            <img src="/GudalijaSite/Style&IMG/assets/arrivals6.jpg" alt="arrivals" />
          </div>
          <div class="arrivals__image">
            <img src="/GudalijaSite/Style&IMG/assets/arrivals4.jpg" alt="arrivals" />
          </div>
          <div class="arrivals__image">
            <img src="/GudalijaSite/Style&IMG/assets/arrivals2.jpg" alt="arrivals" />
          </div>
        </div>
      </div>
    </section>

    <section class="banner__2">
      <div class="section__container banner__2__container">
        <p>SUPER WYPRZEDAŻ</p>
        <h2>DO 25% PROMOCJI</h2>
        <div class="countdown" id="countdown">
          <div class="square">
            <span id="days">0</span>
            <span>DAYS</span>
          </div>
          <div class="square">
            <span id="hours">0</span>
            <span>HRS</span>
          </div>
          <div class="square">
            <span id="minutes">0</span>
            <span>MINS</span>
          </div>
          <div class="square">
            <span id="seconds">0</span>
            <span>SEC</span>
          </div>
        </div>
        <a href="/GudalijaSite/SystemLogowanie/sign-in.php">
        <button>SHOP NOW</button>
        </a>
      </div>
    </section>
    
    <script>
      // Ustawienie docelowego czasu z PHP
      var targetTime = '<?php echo date("Y-m-d H:i:s", strtotime("+1 day")); ?>';
    
      // Funkcja obsługująca odliczanie
      function countdown() {
        var now = new Date().getTime();
        var target = new Date(targetTime).getTime();
        var remainingTime = target - now;
    
        var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
        var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
    
        document.getElementById("days").innerText = days;
        document.getElementById("hours").innerText = hours;
        document.getElementById("minutes").innerText = minutes;
        document.getElementById("seconds").innerText = seconds;
    
        if (remainingTime <= 0) {
          clearInterval(timerInterval);
          document.getElementById("countdown").innerHTML = "Time's up!";
        }
      }
    
      // Uruchomienie odliczania co sekundę
      var timerInterval = setInterval(countdown, 1000);
    </script>

<section class="seller">
  <div class="section__container seller__container">
    <div class="section__header">
      <div class="section__title">NAJLEPSZE TOWARY I PROMOCJE</div>
      <div class="seller__nav">
        <span><i class="ri-arrow-left-s-line"></i></span>
        <span><i class="ri-arrow-right-s-line"></i></span>
      </div>
    </div>
    <div class="seller__grid">
      <?php
      // Pobierz produkty z bazy danych
      $servername = "localhost"; // Twój serwer MySQL
      $username = "root"; // Twój użytkownik MySQL
      $password = ""; // Twoje hasło MySQL
      $dbname = "Users"; // Twoja nazwa bazy danych

      // Połącz z bazą danych
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
      }

      // Pobierz produkty z bazy danych
      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Wyświetl produkty
        while ($row = $result->fetch_assoc()) {
          $productId = $row['id'];
          $productName = $row['name'];
          $productPrice = $row['price'];
          $productImage = $row['image_path'];

          // Wygeneruj kartę produktu
          echo '<div class="seller__card">';
            echo '<img src="' . $productImage . '" alt="' . $productName . '" width="80" height="200">';
            echo '<div class="seller__card__details">';
            echo '<p>' . $productName . '</p>';
            echo '<p> 1 vnt. '. $productPrice . ' zł </p>';
            echo '<a href="/GudalijaSite/SystemLogowanie/sign-in.php">';
            echo '<button>Kup teraz</button>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
        }
      } else {
        echo "Brak produktów w bazie danych.";
      }

      $conn->close();
      ?>
      
    </div>
  </div>
</section>

    <section class="banner__3">
      <div class="section__container banner__3__container">
        <p>Stwórz</p>
        <h2>Gudalija - Twój wybór, Twoje wymiary</h2>
      </div>
    </section>

    <section class="product">
      <div class="section__container product__container">
        <div class="section__header">
          <h3 class="section__title">PROJEKTY DOMKÓW Z DREWNA</h3>
          <div class="product__nav">
            <span><i class="ri-arrow-left-s-line"></i></span>
            <span><i class="ri-arrow-right-s-line"></i></span>
          </div>
        </div>
        <div class="product__grid">
          <div class="product__image">
            <img src="/GudalijaSite/Style&IMG/assets/projekty4BG.jpeg" alt="product" />
          </div>
          <div class="product__image">
            <img src="/GudalijaSite/Style&IMG/assets/projekty2BG.jpeg" alt="product" />
          </div>
          <div class="product__image">
            <img src="/GudalijaSite/Style&IMG/assets/projekty3BG.jpeg" alt="product" />
          </div>
          <div class="product__image">
            <img src="/GudalijaSite/Style&IMG/assets/projekty1BG.jpeg" alt="product" />
          </div>
        </div>
      </div>
    </section>

    <section class="blog">
      <div class="section__container blog__container">
        <div class="section__header">
          <h3 class="section__title">NASZY BLOGI</h3>
        </div>
        <div class="blog__grid">
          <div class="blog__card">
            <img src="/GudalijaSite/Style&IMG/assets/blog-1.jpg" alt="blog" />
            <div class="blog__details">
              <h4>Tartak Gudalija - Twój wybór, Twoje wymiary</h4>
              <p>
                Zapraszamy do tartaku Gudalija, gdzie spełnimy Twoje 
                wszystkie potrzeby dotyczące desek! Oferujemy szeroki 
                wybór różnych wymiarów, dostosowanych do Twoich 
                indywidualnych preferencji. Niezależnie od tego, 
                czy potrzebujesz długich, krótkich, szerokich czy wąskich desek, 
                mamy je wszystkie! Nasz doświadczony 
                zespół jest gotów obsłużyć Twoje zamówienie i zapewnić Ci deski 
                o wymiarach, które idealnie pasują do Twojego projektu. 
              </p>
              <span>czytać więcej</span>
            </div>
          </div>
          <div class="blog__card">
            <img src="/GudalijaSite/Style&IMG/assets/dom.png" alt="blog" />
            <div class="blog__details">
              <h4>Twórcy pięknych drewnianych domków, od projektu do konstrukcji</h4>
              <p>
                Nasi doświadczeni projektanci i rzemieślnicy tworzą indywidualne plany, 
                dopasowane do Twoich preferencji i potrzeb. Każdy dom jest starannie 
                zaprojektowany, aby zapewnić funkcjonalność, estetykę i trwałość. 
                Wykorzystujemy wysokiej jakości drewno, dbając o szczegóły i jakość 
                wykonania, aby każdy projekt był wyjątkowy i satysfakcjonujący dla 
                naszych klientów.
              </p>
              <span>czytać więcej</span>
            </div>
          </div>
          <div class="blog__card">
            <img src="/GudalijaSite/Style&IMG/assets/sadzim.jpg" alt="blog" />
            <div class="blog__details">
              <h4>Tartak Gudalija - Nasza troska o lasy sięga dalej</h4>
              <p>
                W Tartaku Gudalija nie tylko pilujemy drewno, ale również podejmujemy
                 zdecydowane działania na rzecz ochrony i odnowy lasów. Nasza firma
                  ma głębokie zrozumienie i szacunek dla środowiska naturalnego, 
                  dlatego angażujemy się w zrównoważone zarządzanie zasobami leśnymi.
              </p>
              <span>czytać więcej</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="section__container footer__container">
        <div class="footer__col">
          <img src="/GudalijaSite/Style&IMG/assets/logoGudaliji.png" alt="logo" />
          <p>
            
Znajdź różnorodne deski wysokiej jakości, które zapewnią 
nie tylko piękno, ale również funkcjonalność Twoim projektom.
          </p>
          <p><i class="ri-phone-fill"></i> +370 000 1541</p>
          <p>
          <a href="https://www.google.com/maps/place/Dangaus+g.+20,+14168+Salot%C4%97/@54.6859219,25.1785278,17z/data=!3m1!4b1!4m6!3m5!1s0x46dd93ad22f6c193:0x43c1dacdbe6a554f!8m2!3d54.6859219!4d25.1785278!16s%2Fg%2F11jkwpchsc?entry=ttu" target="_blank"> 
            <i class="ri-map-pin-2-fill"></i>
            Dangaus g. 20, Gudeliai,
            Zujūnų sen., Vilniaus raj.
            LT - 14168 Lietuva
          </a>
          </p>
        </div>
        <div class="footer__col">
          <h4>INFORMACJA</h4>
          <p>Mapa strony</p>
          <p>Terminy do wyszukiwania</p>
          <p>Zaawansowane poszukiwanie</p>
          <p><a href="https://policies.google.com/privacy?hl=pl" target="_blank">Polityka prywatności</a></p>
          <p>Dostawcy</p>
        </div>
        <div class="footer__col">
          <h4>MOJE KONTO</h4>
          
          <p><a href="/GudalijaSite/SystemLogowanie/sign-in.php">Zaloguj się</a></p>
          
          <p><a href="/GudalijaSite/SystemLogowanie/sign-in.php">Zarejestruj się</a></p>

          <p>Koszyk sklepowy</p>
          <p>FAQs</p>
          <p>Zostaw komentarz</p>
        </div>
      </div>
      <div class="footer__bar">
        Copyright &#169; IT Conquerors Team. All rights reserved.
      </div>
    </footer>
  </body>
</html>
