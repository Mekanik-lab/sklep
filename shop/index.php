<?php
    include 'db.php';
    session_start();
    if (isset($_SESSION['login'])) {
        $login = $_SESSION['login'];
    } else {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep</title>
    <link rel="shortcut icon" href="./assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <script src="menu.js"></script>
    <script src="year.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <section id="page-title-container">
        <h1 id="page-title">Sklep</h1>
    </section>
    <main id="products-catalog"> 
        <?php
            $query = "SELECT * FROM motors";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<figure>";
                echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "' class='product-img'>";
                echo "<figcaption>" . $row['name'] . "<br> <span id='price'>" . $row['price'] . " PLN</span></figcaption>";
                echo "<button class='product-button'>Dodaj do koszyka</button>";
                echo "</figure>";
            }
        ?>
    </main>
    <?php include 'footer.php'; ?>
    <?php mysqli_close($conn); ?>
</body>
</html>