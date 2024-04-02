<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indiase restaurant</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <header>
        <a href="home.php">
            <img src="Images/DALL·E 2024-03-19 12.56.16 - Design a small, stylish logo for a restaurant called _Indiase Restaurant_. The logo should feature iconic Indian elements, such as a lotus flower or t.jpeg" alt="Image">
        </a>
        <nav>
        <a href="home.php" class="<?php if ($_SERVER['PHP_SELF'] == '/home.php') { echo 'active'; } ?>">Home</a>
            <?php if (isset($_SESSION['id']) && ($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'manager')) : ?>
                <div class="dropdown">
                    <button class="dropbtn <?= ($_SERVER['PHP_SELF'] == '/gerechten.php' ? 'active' : '') ?>">Gerechten</button>
                    <div class="dropdown-content">
                        <a href="admingerechten.php" class="<?= ($_SERVER['PHP_SELF'] == '/gerechten.php' ? 'active' : '') ?>">Adminpage</a>
                        <a href="gerechten.php" class="<?= ($_SERVER['PHP_SELF'] == '/gerechten.php' ? 'active' : '') ?>">Klantpage</a>
                    </div>
                </div>
            <?php else : ?>
                <a href="gerechten.php" class="<?= ($_SERVER['PHP_SELF'] == '/gerechten.php' ? 'active' : '') ?>">Gerechten</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['id'])) : ?>
                <?php if ($_SESSION['rol'] == 'klant') : ?>
                    <a href="reserveren.php" class="<?= ($_SERVER['PHP_SELF'] == '/reserveren.php' ? 'active' : '') ?>">Reserveren</a>
                    <a href="klantendashboard.php" class="<?= ($_SERVER['PHP_SELF'] == '/klantendashboard.php' ? 'active' : '') ?>">Dashboard</a>
                    <a href="gebruiker.php" class="<?= ($_SERVER['PHP_SELF'] == '/gebruiker.php' ? 'active' : '') ?>"><?php echo $_SESSION['voornaam'] ?></a>
                <?php endif; ?>
                <?php if ($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'manager') : ?>
                    <a href="reserveren.php" class="<?= ($_SERVER['PHP_SELF'] == '/reserveren.php' ? 'active' : '') ?>">Reserveren</a>
                    <a href="dashboard.php" class="<?= ($_SERVER['PHP_SELF'] == '/dashboard.php' ? 'active' : '') ?>">Dashboard</a>
                    <a href="gebruikers.php" class="<?= ($_SERVER['PHP_SELF'] == '/gebruikers.php' ? 'active' : '') ?>">Gebruikers</a>
                <?php endif; ?>
                <a href="logout.php">Uitloggen</a>
            <?php else : ?>
                <a href="login.php" class="btn btn-success">Inloggen</a>
            <?php endif; ?>
        </nav>
    </header>
    