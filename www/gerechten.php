<?php   
session_start();
require 'database.php';
include 'header.php';

$zoek = isset($_GET['zoek']) ? $_GET['zoek'] : '';
$sqlzoek = "SELECT * FROM Product WHERE naam LIKE :zoek OR beschrijving LIKE :zoek OR ingredienten LIKE :zoek OR aantal_voorraad LIKE :zoek OR vega LIKE :zoek OR verkoopprijs LIKE :zoek";
$stmt = $conn->prepare($sqlzoek);
$stmt->execute([':zoek' => '%' . $zoek . '%']); // Execute the statement with the search term
echo "<h1 class=\"titelger\">Alle gerechten</h1>";

//zoeken
echo "<form method=\"get\"action=\"gerechten.php\">";
echo "<input type=\"text\" name=\"zoek\" value=\"{$zoek}\" placeholder=\"Zoeken\">";
echo "</form>";

echo "<div class='gerechten'>";
$gerechten = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch the results of the executed statement
foreach ($gerechten as $gerecht) {
    $vega = $gerecht['vega'] == 1 ? 'Ja' : 'Nee';
    echo "<div class='gerechtcon'>";
    echo "<img src='Images/{$gerecht['afbeelding']}' alt='Image'>";
    echo "<div class='text'>";
    echo "<h2>{$gerecht['naam']}</h2>";
    echo "<p>Kosten: € {$gerecht['verkoopprijs']}</p>";
    echo "<p>{$gerecht['beschrijving']}</p>";
    echo "<p>Vegetarisch: {$vega}</p>";
    echo "<p>Ingredienten: {$gerecht['ingredienten']}</p>";
if(isset($_SESSION['rol'])){
    if ($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'manager') {
        echo "<p>Op voorraad: {$gerecht['aantal_voorraad']}</p>";
    }}
    echo "</div>";
    echo "<button type=\"button\">Bestellen</button>";
    echo "</div>";
}
echo "</div>";

?>
<?php 
if(isset($_SESSION['rol'])){
    if ($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'manager'){
        echo "<a href=\"gerecht-toevoegen.php\" class=\"button-gerecht-toevoegen1\">gerecht toevoegen</a>";
    }
    }
?>