<?php
session_start();
require 'database.php';
include 'header.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'manager') {
    header('Location: gerechten.php');
    exit();
}
?>
<main>
    <div class="container">
    <form action="gerecht-toevoegen-process.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
    <label for="naam">Naam</label>
    <input type="text" name="naam" id="naam" required>
    </div>
    <div class="form-group">
        <label for="beschrijving">Beschrijving</label>
        <textarea name="beschrijving" id="beschrijving" required></textarea>
    </div>
    <div class="form-group">
    <label for="ingredienten">Ingredienten</label>
    <input type="text" name="ingredienten" id="ingredienten" required>
    </div>
    <div class="form-group">
    <label for="duur">bereidings tijd</label>
    <input type="text" name="duur" id="duur" required>
    </div>
    <div class="form-group">
        <label for="vega">Vegetarisch</label>
        <input type="checkbox" name="vega" id="vega">
    </div>
    <div class="form-group">
    <label for="verkoopprijs">Verkoopprijs</label>
    <input type="number" name="verkoopprijs" id="verkoopprijs" required>
    </div>
    <div class="form-group">
        <label for="inkoopprijs">Inkoopprijs</label>
        <input type="number" name="inkoopprijs" id="inkoopprijs" required>
    </div>
    <div class="form-group">
    <label for="aantal_voorraad">Aantal voorraad</label>
    <input type="number" name="aantal_voorraad" id="aantal_voorraad" required>
    </div>
    <div class="form-group">
        <label for="categorie">Categorie</label>
        <select name="categorie" id="categorie" required>
            <option value="">Selecteer een categorie</option>
            <option value="hoofdgerechten">Hoofdgerecht</option>
            <option value="voorgerechten">Voorgerecht</option>
            <option value="bijgerechten">Bijgerecht</option>
            <option value="desserts">Dessert</option>
            <option value="dranken">Drank</option>
            <option value="speciale_menu's">Speciale menu</option>
        </select>
    </div>

    <div class="form-group">
        <label for="menugang">Menugang</label>
        <select name="menugang" id="menugang" required>
            <option value="">Selecteer een menugang</option>
            <option value="voorafjes">Voorafje</option>
            <option value="soepen_salades:">Soepen en Salades</option>
            <option value="tussengerecht">Tussengerecht</option>
            <option value="hoofdgerecht">Hoofdgerecht</option>
            <option value="bijgerecht">Bijgerecht</option>
            <option value="dessert">Desserts</option>
            <option value="dranken">Dranken</option>
        </select>
    </div>
    <div class="form-group">
    <label for="afbeelding">Afbeelding</label>
    <input type="text" name="afbeelding" id="afbeelding" required>
</div>
    <input type="submit" value="Toevoegen">
</form>
</div>
</main>