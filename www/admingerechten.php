<?php 
session_start();
require 'database.php';

if ($_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'manager') {
    header('Location: login.php');
    exit();
}
include 'header.php';

$zoek = isset($_GET['zoek']) ? $_GET['zoek'] : '';
$sqlzoek = "SELECT Product.*, Categorie.categorie AS categorie_naam, Menugang.menugang_naam AS menugang_naam 
            FROM Product 
            LEFT JOIN Categorie ON Product.categorie_id = Categorie.categorie_id
            LEFT JOIN Menugang ON Product.menugang_id = Menugang.menugang_id
            WHERE Product.naam LIKE :zoek 
            OR Product.beschrijving LIKE :zoek 
            OR Product.ingredienten LIKE :zoek 
            OR Product.aantal_voorraad LIKE :zoek 
            OR Product.vega LIKE :zoek 
            OR Product.verkoopprijs LIKE :zoek 
            OR Product.inkoopprijs LIKE :zoek 
            OR Categorie.categorie LIKE :zoek 
            OR Menugang.menugang_naam LIKE :zoek";
$stmt = $conn->prepare($sqlzoek);
$stmt->execute([':zoek' => '%' . $zoek . '%']); // Execute the statement with the search term

echo "<h2><a href=\"gerecht-toevoegen.php\">Gerecht toevoegen</a></h2>";

// Search form
echo "<form method=\"get\"action=\"admingerechten.php\">";
echo "<input type=\"text\" name=\"zoek\" value=\"{$zoek}\" placeholder=\"Zoeken\">";
echo "</form>";

echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th>Gerecht ID</th>";
echo "<th>Naam</th>";
echo "<th>Beschrijving</th>";
echo "<th>Ingredienten</th>";
echo "<th>Bereidingstijd</th>";
echo "<th>Vegetarisch</th>";
echo "<th>Verkoopprijs</th>";
echo "<th>Inkoopprijs</th>";
echo "<th>Voorraad</th>";
echo "<th>Categorie</th>";
echo "<th>Menugang</th>";
echo "<th>Aanpassen</th>";
echo "<th>Verwijderen</th>";
echo "</tr>";
echo "</thead>";

$gerechten = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch the results of the executed statement
foreach ($gerechten as $gerecht) {
    $vega = $gerecht['vega'] == 1 ? 'Ja' : 'Nee';
    echo "<tr>";
    echo "<tbody>";
    echo "<td>{$gerecht['product_id']}</td>";
    echo "<td>{$gerecht['naam']}</td>";
    echo "<td>{$gerecht['beschrijving']}</td>";
    echo "<td>{$gerecht['ingredienten']}</td>";
    echo "<td>{$gerecht['duur']}</td>";
    echo "<td>{$vega}</td>";
    echo "<td>€ {$gerecht['verkoopprijs']}</td>";
    echo "<td>€ {$gerecht['inkoopprijs']}</td>";
    echo "<td>{$gerecht['aantal_voorraad']}</td>";
    echo "<td>{$gerecht['categorie_naam']}</td>";
    echo "<td>{$gerecht['menugang_naam']}</td>";
    echo "<td><a href=\"gerecht-aanpassen.php?id={$gerecht['product_id']}\">Aanpassen</a></td>";
    echo "<td><a href=\"verwijdergerecht.php?id={$gerecht['product_id']}\">Verwijderen</a></td>"; // Changed form to a link
    echo "</tbody>";
    echo "</tr>";
}

echo "</table>";

?>

<style>
    h2 a {
        text-decoration: none;
        color: black;
    }
</style>