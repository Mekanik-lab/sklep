<?php
include 'db.php';
session_start();
$error = ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password_input = trim($_POST['password']);
    $email = trim($_POST['email']);

    if (empty($login) || empty($password_input) || empty($email)) {
        $error = "Wszystkie pola są wymagane!";
    } else {
        $login = mysqli_real_escape_string($conn, $login);
        $password = password_hash(mysqli_real_escape_string($conn, $password_input), PASSWORD_DEFAULT);
        $email = mysqli_real_escape_string($conn, $email);

        $check = mysqli_query($conn, "SELECT id FROM users WHERE login = '$login'");
        if (mysqli_num_rows($check) > 0) {
            $error = "Taki login już istnieje!";
        } else {
            $sql = "INSERT INTO users (login, password, email) VALUES ('$login', '$password', '$email')";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['login'] = $login;
                $_SESSION['user_id'] = mysqli_insert_id($conn);
                header("Location: index.php");
                exit();
            } else {
                $error = "Błąd podczas rejestracji: " . mysqli_error($conn);
            }
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <script src="menu.js"></script>
    <script src="year.js"></script>
    <title>Rejestracja</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <section id="page-title-container">
        <h1 id="page-title">Rejestracja</h1>
    </section>
    <main class="form-container">
        <form action="" method="POST">
            <label for="register-input">Login</label>
            <input id="register-input" type="text" name="login" required>
            
            <label for="password-input">Hasło</label>
            <input id="password-input" type="password" name="password" required>
            
            <label for="email-input">E-mail</label>
            <input id="email-input" type="email" name="email" required>
            
            <button type="submit" class="form-button product-button">Zarejestruj się</button>
        </form>
        <?php if($error) echo "<p class='error'>$error</p>"; ?>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>