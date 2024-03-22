<?php 
session_start();
require "database.php";
include "header.php";
?>
<section class="home">
<img src="Images/indiaseeten.png" alt="foto indiase eten">
<h1 class="title">Welkom bij Indiase Restaurant</h1>
</section>
<main>
    <div class="home1">
        <img src="Images\Indiase_Restaurant_Logo.jpeg" alt="image">
        <div class="tijden">
        <span class="material-symbols-outlined">
        history_toggle_off
        </span>
            <p>Maandag: 08:00 - 18:00</p>
            <p>Dinsdag: 08:00 - 18:00</p>
            <p>Woensdag: 08:00 - 18:00</p>
            <p>Donderdag: 08:00 - 18:00</p>
            <p>Vrijdag: 08:00 - 18:00</p>
            <p>Zaterdag: 08:00 - 18:00</p>
            <p>Zondag: Gesloten</p>
        </div>
        <div class="bezorgen">
        <span class="material-symbols-outlined">
        quick_reorder
        </span>
            <p>Wij bezorgen vanaf 17:00 tot 21:00</p>
            <p>Bezorgkosten: €2,50</p>
            <p>Gratis bezorgen vanaf €20,-</p>
        </div>
        <div class="adres">
        <span class="material-symbols-outlined">
        home_pin
        </span>
            <p>Indiase Restaurant</p>
            <p>Adres: 1234AB</p>
            <p>Plaats: Amsterdam</p>
            <p>Telefoon: 1234567890</p>
        </div>
    </div>
    <div class="home2">
        <h1>Openingstijden</h1>
        <div>
            <div>Maandag: 08:00 - 18:00</div>
            <div>Dinsdag: 08:00 - 18:00</div>
            <div>Woensdag: 08:00 - 18:00</div>
            <div>Donderdag: 08:00 - 18:00</div>
            <div>Vrijdag: 08:00 - 18:00</div>
            <div>Zaterdag: 08:00 - 18:00</div>
            <div>Zondag: Gesloten</div>
        </div>
    </div>
</main>


<?php include "footer.php" ?>
<script src="script.js"></script>
<style>
    .palette {
        display: grid;
        grid-template-columns: 1fr;
        gap: 8px;
    }
</style>