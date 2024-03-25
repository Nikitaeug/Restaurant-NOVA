<?php
session_start();
require "database.php";
include "header.php";

?>
<main>
    <h1>Registratie</h1>
        <div class="container">
            <form action="reg-process.php" method="post">
                <div class="form-group">
                    <label  for="email">Email</label>
                    <input type="email" name="email" placeholder="email" required>
                    <label for="voornaam">naam</label>
                    <input type="text" name="voornaam" placeholder="naam" required>
                    <label for="achternaam">achternaam</label>
                    <input type="text" name="achternaam" placeholder="achternaam" required>
                    <label for="wachtwoord">Wachtwoord</label>
                    <input type="password" name="wachtwoord" placeholder="wachtwoord" required>
                </div>
                <div class="adres">
                    <label for="straat">straat</label>
                    <input type="text" name="straat" placeholder="straat" required>
                    <label for="huisnummer">huisnummer</label>
                    <input type="text" name="huisnummer" placeholder="huisnummer" required>
                    <label for="postcode">postcode</label>
                    <input type="text" name="postcode" placeholder="postcode" required>
                    <label for="plaats">woonplaats</label>
                    <input type="text" name="plaats" placeholder="woonplaats" required>

                </div>
                <button name="submit" class="btn btn-success">Registreren</button>
                <a href="login.php">Heb je al een account?</a>
            </form>
        </div>
</main>