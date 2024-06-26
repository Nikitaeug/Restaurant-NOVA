<?php
session_start();
require 'database.php';               //DIT MOET UITGELEGD WORDEN


if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'manager') {
    header('Location: gerechten.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $naam = $_POST['naam'];
    $beschrijving = $_POST['beschrijving'];
    $ingredienten = $_POST['ingredienten'];
    $duur = $_POST['duur'];
    $vega = isset($_POST['vega']) ? 1 : 0;
    $verkoopprijs = $_POST['verkoopprijs'];
    $inkoopprijs = $_POST['inkoopprijs'];
    $aantal_voorraad = $_POST['aantal_voorraad'];
    $categorie = $_POST['categorie'];
    $menugang = $_POST['menugang'];
    $afbeelding = $_POST['afbeelding'];
    // Get the ID from the menugang table
    $sql = "SELECT menugang_id FROM Menugang WHERE menugang_naam = :menugang";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':menugang' => $menugang]);
    $menugang_id = $stmt->fetchColumn();

    // Get the ID from the categorie table
    $sql = "SELECT categorie_id FROM Categorie WHERE categorie = :categorie";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':categorie' => $categorie]);
    $categorie_id = $stmt->fetchColumn();

    // Now use these IDs when inserting into the Product table
    $sql = "INSERT INTO Product (naam, beschrijving, ingredienten, duur, vega, verkoopprijs, inkoopprijs, aantal_voorraad, categorie_id, menugang_id, afbeelding) VALUES (:naam, :beschrijving, :ingredienten, :duur, :vega, :verkoopprijs, :inkoopprijs, :aantal_voorraad, :categorie_id, :menugang_id, :afbeelding)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':naam' => $naam, ':beschrijving' => $beschrijving, ':ingredienten' => $ingredienten, ':duur' => $duur, ':vega' => $vega, ':verkoopprijs' => $verkoopprijs, ':inkoopprijs' => $inkoopprijs, ':aantal_voorraad' => $aantal_voorraad, ':categorie_id' => $categorie_id, ':menugang_id' => $menugang_id, ':afbeelding' => $afbeelding]);
}

if ($stmt->rowCount() > 0) {
header('Location: gerechten.php');
exit();
}
include 'header.php';
?>