<?php
session_start();
require 'database.php';

if ($_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'manager') {
    header('Location: login.php');
    exit();
}
if (empty($_POST['categorie'])) {
    echo "<h2>categorie is empty</h2>";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';
    $sql = "INSERT INTO Categorie (categorie) VALUES (:categorie)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':categorie' => $categorie]);
    header('Location: admingerechten.php');
    exit();
}

?>