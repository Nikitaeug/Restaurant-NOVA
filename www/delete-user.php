<?php 
session_start();
require "database.php";
if ($_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'manager') {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];


$stmt = $conn->prepare("DELETE FROM Gebruiker WHERE gebruiker_id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->execute() == true) {
    header("Location: home.php");
    session_unset();
    session_destroy();
    exit;
} else {
    echo "Er is iets misgegaan";
}