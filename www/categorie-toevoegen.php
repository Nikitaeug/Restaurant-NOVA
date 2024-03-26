<?php
session_start();
require 'database.php';

if ($_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'manager') {
    header('Location: login.php');
    exit();
}

include 'header.php';
?>
<main>
    <h1>Categorie toevoegen</h1>
    <form action="categorie-toevoegen-process.php" method="post">
        <label for="categorie">Categorie</label>
        <input type="text" name="categorie" id="categorie">
        <input type="submit" value="Toevoegen">
    </form>