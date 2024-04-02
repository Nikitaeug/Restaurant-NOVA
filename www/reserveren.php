<?php
session_start();
require "database.php";
include "header.php";

?>
<div class='background-image2'>;
<main>
    <h1>Reserveren</h1>
        <div class="container">
            <form action="reserveren-process.php" method="post">
                <div class="form-group">
                    <label for="aantal_personen">aantal personen</label>
                    <input type="text" id="aantal_personen" name="aantal_personen" placeholder="aantal personen" autocomplete="on" required>
                </div>
                <div class="form-group">
                    <label for="datum">datum</label>
                    <input type="date" id="datum" name="datum" placeholder="datum" autocomplete="on" required>
                </div>
                <div class="form-group">
                    <label for="tijd">tijd</label>
                    <input type="time" id="tijd" name="tijd" placeholder="tijd" autocomplete="on" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="email" autocomplete="on" required>
                </div>
                <button name="submit" class="btn btn-success">Registreren</button>
            </form>
        </div>
</main>
</div>