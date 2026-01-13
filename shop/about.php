
<?php
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
    <link rel="shortcut icon" href="./assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <script src="menu.js"></script>
    <script src="year.js"></script>
    <title>O nas</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <section id="page-title-container">
        <h1 id="page-title">O nas</h1>
    </section>
    <main id="about-container">
        <p>
            Motocross Power to sklep stworzony z myślą o osobach, które traktują motocross
            poważnie. Niezależnie od tego, czy dopiero zaczynasz swoją przygodę z jazdą
            w terenie, czy regularnie trenujesz na torze, odpowiedni sprzęt ma realne znaczenie.
        </p>
        <br>
        <p>
            Skupiamy się na sprawdzonych produktach, które wpływają na komfort, bezpieczeństwo
            i osiągi. W ofercie znajdują się części, akcesoria oraz wyposażenie przeznaczone
            do jazdy motocrossowej i enduro. Nie sprzedajemy przypadkowych rzeczy.
        </p>
        <br>
        <p>
            Stawiamy na prostą zasadę: sprzęt ma działać w trudnych warunkach, a nie tylko
            dobrze wyglądać na zdjęciu. Dlatego wybieramy produkty, które sprawdzają się
            w praktyce.
        </p>
        <br>
        <p>
            Motocross Power to nie korporacja i nie masowa sprzedaż wszystkiego dla wszystkich.
            To miejsce dla osób, które wiedzą, czego oczekują od swojego motocykla i swojego
            sprzętu.
        </p>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>