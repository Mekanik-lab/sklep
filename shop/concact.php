<?php
include 'db.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$login = $_SESSION['login'];
$error = "";
$success = "";
$subject = "";
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (empty($subject) || empty($message)) {
        $error = "Wszystkie pola są wymagane!";
    } else {
        $subject_safe = mysqli_real_escape_string($conn, $subject);
        $message_safe = mysqli_real_escape_string($conn, $message);

        $sql = "INSERT INTO messages (subject, message, user_id) VALUES ('$subject_safe', '$message_safe', '$user_id')";
        if (mysqli_query($conn, $sql)) {
            $success = "Wiadomość została wysłana!";
            $subject = "";
            $message = "";
            $error = "";
        } else {
            $error = "Błąd podczas wysyłania wiadomości: " . mysqli_error($conn);
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
<title>Kontakt</title>
</head>
<body>
<?php include 'header.php'; ?>
<section id="page-title-container">
    <h1 id="page-title">Kontakt</h1>
</section>
<main id="concact-conatiner">
    <section id="concact-text">
        <p>
            Masz pytania dotyczące produktów, zamówienia lub dostępności?
            <br>    
            Skontaktuj się z nami, odpowiadamy możliwie najszybciej.
        </p>
    </section>
    <section id="concact-form">
        <form action="" method="POST">
            <label for="subject">Temat</label>
            <input id="subject" type="text" name="subject" placeholder="Wpisz temat" value="<?php echo htmlspecialchars($subject); ?>" required>
            
            <label for="message">Wiadomość</label>
            <textarea name="message" id="message" placeholder="Wpisz wiadomość" rows="10" cols="30" required><?php echo htmlspecialchars($message); ?></textarea>
            
            <button type="submit" class="form-button product-button">Wyślij</button>
        </form>
        <?php 
            if($error) echo "<p class='error'>$error</p>";
            if($success) echo "<p class='success'>$success</p>";
        ?>
    </section>
</main>
<?php include 'footer.php'; ?>
</body>
</html>