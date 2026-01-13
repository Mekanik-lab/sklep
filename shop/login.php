<?php
include 'db.php';
session_start();
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $input_password = trim($_POST['password']); 

    if (empty($login) || empty($input_password)) {
        $error = "Wszystkie pola są wymagane!";
    } else {
        $login = mysqli_real_escape_string($conn, $login);

        $sql = "SELECT id, login, password FROM users WHERE login = '$login'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);
            $hashed_password = $user['password'];

            if (password_verify($input_password, $hashed_password)) {
                $_SESSION['login'] = $user['login'];
                $_SESSION['user_id'] = $user['id'];
                header("Location: index.php");
                exit();
            } else {
                $error = "Nieprawidłowy login lub hasło";
            }
        } else {
            $error = "Nieprawidłowy login lub hasło";
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
    <title>Logowanie</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <section id="page-title-container">
        <h1 id="page-title">Logowanie</h1>
    </section>
    <main class="form-container">
        <form action="" method="POST">
            <label for="login-input">
                Login:
            </label>
            <input id="login-input" type="text" name="login" required>
            <label for="password-input">
                Hasło:
            </label>
            <input id="password-input"type="password" name="password" required>
            <button type="submit" class="form-button product-button">Zaloguj się</button>
        </form>
        <?php if($error) echo "<p class='error'>$error</p>"; ?>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>