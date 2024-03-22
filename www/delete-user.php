<?php 
session_start();
require "database.php";

$id = $_GET['id'];


$stmt = $conn->prepare("DELETE FROM Gebruiker WHERE gebruiker_id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->execute() == true) {
    header("Location: home.php");
    exit;
} else {
    echo "Er is iets misgegaan";
}