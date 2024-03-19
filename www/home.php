<?php 
session_start();
require "database.php";
include "header.php";
?>
<main>
    <h1>Home</h1>
    <p>Welkom op de homepagina</p>
    <div class="palette">Palette colors:
        <div>$cosmic-latte: #F8F4E5ff;</div>
        <div>$beige: #DDE2CEff;</div>
        <div>$ash-gray: #C1D0B7ff;</div>
        <div>$cambridge-blue: #A6BEA1ff;</div>
        <div>$cambridge-blue-2: #8BAB8Aff;</div>
        <div>$asparagus: #6F9973ff;</div>
        <div>$sea-green: #54875Cff;</div>
    </div>
</main>

<?php include "footer.php" ?>
<style>
    .palette {
        display: grid;
        grid-template-columns: 1fr; /* One column */
        gap: 8px; /* Space between items */
    }
</style>