<?php
session_start();

// Funkcja do zapisu komentarza w bazie danych
function saveComment($userId, $name, $feedback, $comment) {
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "Users";

    // Tworzenie połączenia z bazą danych
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    // Sprawdzanie połączenia
    if ($conn->connect_error) {
        die("Nieudane połączenie z bazą danych: " . $conn->connect_error);
    }

    // Zabezpieczenie danych przed wstrzykiwaniem SQL
    $name = $conn->real_escape_string($name);
    $comment = $conn->real_escape_string($comment);

    // Zapytanie SQL do zapisu komentarza w bazie danych
    $sql = "INSERT INTO comments (user_id, name, feedback, comment, date_added) 
            VALUES ('$userId', '$name', '$feedback', '$comment', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Komentarz został dodany: $comment</p>";
    } else {
        echo "Błąd podczas dodawania komentarza: " . $conn->error;
    }

    $conn->close();
}

// Funkcja do sprawdzenia, czy komentarz przekracza limit 150 słów
function isCommentValid($comment) {
    $words = explode(' ', $comment);
    return count($words) <= 150;
}

// Sprawdzenie, czy użytkownik jest zalogowany
if (!isset($_SESSION['username'])) {
    header('Location: ../sign-in.php'); // Przekierowanie do strony logowania w przypadku braku zalogowania
    exit();
}

// Obsługa przesłanego formularza
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comment'])) {
        $comment = $_POST['comment'];
        if (isCommentValid($comment)) {
            $userId = $_SESSION['user_id'];
            $name = $_SESSION['username'];
            $feedback = $_POST['feedback'];
            saveComment($userId, $name, $feedback, $comment);
        } else {
            echo "<p>Komentarz przekracza limit 150 słów.</p>";
        }
    }
}
