<?php
session_start();
require "database.php";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    // Handle the case where "id" is not set in the session
    exit('Invalid request.');
}

if ($_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'manager') {
    header('Location: login.php');
    exit();
}
include "header.php";
?>
<main>
<h1>Wachtwoord aanpassen</h1>

<div class="container">
    <form action="reset-process.php" method="post">
        <div class="form-group">
            <label for="wachtwoord">oude wachtwoord</label>
            <input type="password" name="owachtwoord" placeholder="oude wachtwoord" required>
        </div>
        <div class="form-group">
            <label for="wachtwoord">nieuwe wachtwoord</label>
            <input type="password" name="nwachtwoord" placeholder="nieuwe wachtwoord" required>
        </div>
        <div class="form-group">
            <label for="wachtwoord">herhaal nieuwe wachtwoord</label>
            <input type="password" name="nhwachtwoord" placeholder="herhaal nieuwe wachtwoord " required>
        </div>
        <button name="submit" class="btn btn-success">Wachtwoord aanpassen</button>
    </form>
</div>
</main>