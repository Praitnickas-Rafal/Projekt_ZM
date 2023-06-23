<?php
session_start();

// Inicjalizowanie zmiennych
$username = "";
$email = "";
$errors = array();

// Połączenie z bazą danych
$db = mysqli_connect('localhost', 'root', '', 'Users');

// Rejestracja użytkownika
if (isset($_POST['reg_user'])) {
    // Otrzymaj wszystkie wartości wejściowe z formularza
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_sh = mysqli_real_escape_string($db, $_POST['password_sh']);
    $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_sh)) {
        array_push($errors, "Password is required");
    }
    if ($password_sh != $confirm_password) {
        array_push($errors, "The two passwords do not match");
    }

    // Sprawdzanie danych w celu uniknięcia duplikacji
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // Sprawdzenie, czy nie ma błędów - zapisanie danych
    if (count($errors) == 0) {
        $password = md5($password_sh);

        $query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";

        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: /GudalijaSite/mainUser.php');
        exit();
    }
}

// Logowanie użytkownika
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password_sh']);

    if (empty($username)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username ='$username' AND password ='$password' ";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $logged_in_user = mysqli_fetch_assoc($results);
            if ($logged_in_user['user_type'] == 'admin') {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in as an administrator";
                header('location: ../adminpanel.php'); // Przekierowanie na adminpanel.php
                exit();
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $logged_in_user['user_id'];
                $_SESSION['success'] = "You are now logged in";
                header('location: ../mainUser.php'); // Przekierowanie na mainUser.php dla zwykłego użytkownika
                exit();
            }
        } else {
            array_push($errors, "Wrong username or password combination");
        }
    }
}

// Wylogowanie użytkownika
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: ../main.php');
    exit();
}
?>
