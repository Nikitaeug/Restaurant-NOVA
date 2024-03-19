<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuh Tools4ever</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <a href="home.php">
            <img src="Images/DALL·E 2024-03-19 12.56.16 - Design a small, stylish logo for a restaurant called _Indiase Restaurant_. The logo should feature iconic Indian elements, such as a lotus flower or t.jpeg" alt="Image">
        </a>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="">#</a></li>
                <li><a href="">#</a></li>
                <?php if (isset($_SESSION['id'])) : ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li class="dropdown">
                        <a href="">Gebruikers</a>
                        <div class="dropdown-content">
                            <a href="#.php">Bekijken</a>
                            <a href="#">Toevoegen</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="">#</a>
                        <div class="dropdown-content">
                            <a href="#">Bekijken</a>
                            <a href="#">Toevoegen</a>
                        </div>
                    </li>

                    <li><a href="logout.php" class="btn btn-danger">Uitloggen</a></li>
                <?php else : ?>
                    <li><a href="login.php" class="btn btn-success">Inloggen</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>