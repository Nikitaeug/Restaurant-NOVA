<?php
session_start();
require 'database.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'manager') {
    header('Location: gerechten.php');
    exit();
}

include 'header.php';

$id = $_GET['id'];
$_SESSION['id'] = $id;

$sql = "SELECT Product.*, Categorie.categorie AS categorie_naam, Menugang.menugang_naam
        FROM Product 
        LEFT JOIN Categorie ON Product.categorie_id = Categorie.categorie_id 
        LEFT JOIN Menugang ON Product.menugang_id = Menugang.menugang_id 
        WHERE Product.product_id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<main>

<h1>Gerecht aanpassen</h1>
<div class="container">

    <form action="gerecht-aanpassen-process.php" method="post">
        <div class="form-group">
                <label for="naam">Naam</label>
                <input type="text" name="naam" value="<?php echo $user['naam'] ?>">
                <input type="hidden" name="product_id" value="<?php echo $user['product_id'] ?>">
        </div>
        <div class="form-group">
                <label for="beschrijving">Beschrijving</label>
                <input type="text" name="beschrijving" value="<?php echo $user['beschrijving'] ?>">
        </div>
        <div class="form-group">
                <label for="ingredienten">Ingredienten</label>
                <input type="text" name="ingredienten" value="<?php echo $user['ingredienten'] ?>">
        </div>
        <div class="form-group">
                <label for="duur">bereidings tijd(min)</label>
                <input type="text" name="duur" value="<?php echo $user['duur'] ?>">
        </div>
        <div class="form-group">
            <label for="vega">Vegetarisch</label>
            <select name="vega">
                <option value="1" <?php echo $user['vega'] == 1 ? 'selected' : ''; ?>>Ja</option>
                <option value="0" <?php echo $user['vega'] == 0 ? 'selected' : ''; ?>>Nee</option>
            </select>
        </div>
        <div class="form-group">
                <label for="verkoopprijs">Verkoopprijs</label>
                <input type="text" name="verkoopprijs" value="<?php echo $user['verkoopprijs'] ?>">
        </div>
        <div class="form-group">
                <label for="inkoopprijs">Inkoopprijs</label>
                <input type="text" name="inkoopprijs" value="<?php echo $user['inkoopprijs'] ?>">
        </div>
        <div class="form-group">
                <label for="aantal_voorraad">Aantal voorraad</label>
                <input type="text" name="aantal_voorraad" value="<?php echo $user['aantal_voorraad'] ?>">
        </div>
        <div class="form-group">
            <label for="categorie">Categorie</label>
            <select name="categorie" id="categorie" required>
            <option value="" disabled><?php echo ucfirst($user['categorie_naam']); ?></option>    
                <option value="hoofdgerechten" <?php echo $user['categorie_id'] == 1 ? 'selected' : ''; ?>>Hoofdgerechten</option>
                <option value="voorgerechten" <?php echo $user['categorie_id'] == 2 ? 'selected' : ''; ?>>Voorgerecht</option>
                <option value="bijgerechten" <?php echo $user['categorie_id'] == 3 ? 'selected' : ''; ?>>Bijgerecht</option>
                <option value="desserts" <?php echo $user['categorie_id'] == 4 ? 'selected' : ''; ?>>Dessert</option>
                <option value="dranken" <?php echo $user['categorie_id'] == 5 ? 'selected' : ''; ?>>Drank</option>
                <option value="speciale_menu's" <?php echo $user['categorie_id'] == 6 ? 'selected' : ''; ?>>Speciale menu</option>
            </select>
        </div>

        <div class="form-group">
            <label for="menugang">Menugang</label>
            <select name="menugang" id="menugang" required>
            <option value="" disabled><?php echo ucfirst($user['menugang_naam']); ?></option>
                <option value="voorafjes" <?php echo $user['menugang_id'] == 1 ? 'selected' : ''; ?>>Voorafje</option>
                <option value="soepen_salades:" <?php echo $user['menugang_id'] == 2 ? 'selected' : ''; ?>>Soepen en Salades</option>
                <option value="tussengerecht" <?php echo $user['menugang_id'] == 3 ? 'selected' : ''; ?>>Tussengerecht</option>
                <option value="hoofdgerecht" <?php echo $user['menugang_id'] == 4 ? 'selected' : ''; ?>>Hoofdgerechten</option>
                <option value="bijgerecht" <?php echo $user['menugang_id'] == 5 ? 'selected' : ''; ?>>Bijgerecht</option>
                <option value="dessert" <?php echo $user['menugang_id'] == 6 ? 'selected' : ''; ?>>Desserts</option>
                <option value="dranken" <?php echo $user['menugang_id'] == 7 ? 'selected' : ''; ?>>Dranken</option>
            </select>
        </div>
        <div class="form-group">
                <label for="afbeelding">Afbeelding</label>
                <input type="text" name="afbeelding" value="<?php echo $user['afbeelding'] ?>">
        </div>
        <button type="submit">Aanpassen</button>
    </form>
</div>
</main>