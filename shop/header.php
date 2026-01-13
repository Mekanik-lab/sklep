<header>
    <a href="index.php" class="logo-link">
        <img src="./assets/logo.png" alt="motocross logo" class="logo-img">
    </a>
    <button id="burger-menu">
        <span class="menu-line"></span>
        <span class="menu-line"></span>
        <span class="menu-line"></span>
    </button>
    <nav class="header-nav">
        <ul class="menu-list">
            <li class="menu-item">
                <a href="index.php" class="menu-link">Strona główna</a>
            </li>
            <li class="menu-item">
                <a href="about.php" class="menu-link">O nas</a>
            </li>
            <li class="menu-item">
                <a href="concact.php" class="menu-link">Kontakt</a>
            </li>
            <?php if (isset($_SESSION['login'])) : ?>
                <li class="menu-item">
                    <a href="logout.php" class="menu-link">Wyloguj się</a>
                </li>
            <?php else : ?>
                <li class="menu-item">
                    <a href="login.php" class="menu-link">Zaloguj się</a>
                </li>
                <li class="menu-item">
                    <a href="register.php" class="menu-link">Zarejestruj się</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>