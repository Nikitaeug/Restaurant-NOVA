<?php
session_start();
require 'database.php';

if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'manager')) {
    header('Location: gerechten.php');
    exit();
}

$fields = ['product_id', 'naam', 'beschrijving', 'ingredienten', 'duur', 'vega', 'verkoopprijs', 'inkoopprijs', 'aantal_voorraad', 'categorie', 'menugang', 'afbeelding'];

foreach ($fields as $field) {
    if (!isset($_POST[$field]) || $_POST[$field] == '') {
        echo "Error: $field is missing.";
        exit();
    }
}

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
} else {
    echo "Error: Product ID is missing.";
    exit();
}

    $id = $_POST['product_id'];
    $naam = $_POST['naam'];
    $beschrijving = $_POST['beschrijving'];
    $ingredienten = $_POST['ingredienten'];
    $duur = $_POST['duur'];
    $vega = $_POST['vega'];
    $verkoopprijs = $_POST['verkoopprijs'];
    $inkoopprijs = $_POST['inkoopprijs'];
    $aantal_voorraad = $_POST['aantal_voorraad'];
    $categorie = $_POST['categorie'];
    $menugang = $_POST['menugang'];
    $afbeelding = $_POST['afbeelding'];
    
    // Fetch the ID for the category
    $sql = "SELECT categorie_id FROM Categorie WHERE categorie = :categorie";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':categorie' => $categorie]);
    $categorie_id = $stmt->fetchColumn();

    // Fetch the ID for the menu category
    $sql = "SELECT menugang_id FROM Menugang WHERE menugang_naam = :menugang";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':menugang' => $menugang]);
    $menugang_id = $stmt->fetchColumn();

    // Update the Product table
    $sql = "UPDATE Product SET naam = :naam, beschrijving = :beschrijving, ingredienten = :ingredienten, duur = :duur, vega = :vega, verkoopprijs = :verkoopprijs, inkoopprijs = :inkoopprijs, aantal_voorraad = :aantal_voorraad, categorie_id = :categorie_id, menugang_id = :menugang_id, afbeelding = :afbeelding WHERE product_id = :id";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([
        ':naam' => $naam,
        ':beschrijving' => $beschrijving,
        ':ingredienten' => $ingredienten,
        ':duur' => $duur,
        ':vega' => $vega,
        ':verkoopprijs' => $verkoopprijs,
        ':inkoopprijs' => $inkoopprijs,
        ':aantal_voorraad' => $aantal_voorraad,
        ':categorie_id' => $categorie_id,
        ':menugang_id' => $menugang_id,
        ':afbeelding' => $afbeelding,
        ':id' => $id
    ]);

    if ($result) {
        header('Location: admingerechten.php');
        exit();
    } else {
        echo "Error updating product.";
        exit();
    }
?>
