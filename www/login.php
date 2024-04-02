<?php 
session_start();
require "database.php";
include "header.php";
$sql = "SELECT * FROM Gebruiker";
$stmt = $conn->prepare($sql);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    $db = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="background-image">
<main>
    <h1>Login</h1>
    <div class="container">
        <form action="login-process.php" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="email">
            </div>
            <div class="form-group">
                <label for="wachtwoord">Wachtwoord</label>
                <input type="password" name="wachtwoord" placeholder="wachtwoord">
            </div>
            <button name="submit" class="btn btn-success">Inloggen</button>
            <a href="reg.php">nog geen account?</a>
        </form>
    </div>
</main>
</div>