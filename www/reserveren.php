<?php
session_start();
require "database.php";
include "header.php";

?>
<main>
    <h1>Reserveren</h1>
        <div class="container">
            <form action="reserveren-process.php" method="post">
                <div class="form-group">
                    <label  for="aantal_personen">aantal personen</label>
                    <input type="text" name="aantal_personen" placeholder="aantal personen" required>
                </div>
                <div class="form-group">
                    <label  for="datum">datum</label>
                    <input type="date" name="datum" placeholder="datum" required>
                </div>
                <div class="form-group">
                    <label  for="tijd">tijd</label>
                    <input type="time" name="tijd" placeholder="tijd" required>
                </div>
                
                <div class="form-group">
                    <label  for="datum">Email</label>
                    <input type="email" name="email" placeholder="email" required>
                </div>
                <button name="submit" class="btn btn-success">Registreren</button>
            </form>
        </div>
</main>




<?php include "footer.php" ?>