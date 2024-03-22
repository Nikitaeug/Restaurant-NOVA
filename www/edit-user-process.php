<?php
session_start();
require "database.php";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    // Handle the case where "id" is not set in the session
    exit('Invalid request.');
}

$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];
$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$rol = $_POST['Rol'];
$straat = $_POST['straat'];
$huisnummer = $_POST['huisnummer'];
$postcode = $_POST['postcode'];
$plaats = $_POST['plaats'];

$sqlgebruiker = "UPDATE Gebruiker SET email = :email, voornaam = :voornaam, achternaam = :achternaam, rol = :rol WHERE gebruiker_id = :id";
$stmt = $conn->prepare($sqlgebruiker);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':voornaam', $voornaam);
$stmt->bindParam(':achternaam', $achternaam);
$stmt->bindParam(':rol', $rol);
$stmt->bindParam(':id', $id); // Add this line
$stmt->execute();

$sqladres = "UPDATE Adres SET straat = :straat, huisnummer = :huisnummer, postcode = :postcode, plaats = :plaats WHERE adres_id = :id";
$stmt = $conn->prepare($sqladres);
$stmt->bindParam(':straat', $straat);
$stmt->bindParam(':huisnummer', $huisnummer);
$stmt->bindParam(':postcode', $postcode);
$stmt->bindParam(':plaats', $plaats);
$stmt->bindParam(':id', $id); // Add this line
$stmt->execute();

if ($stmt->execute()) {
    header('location: gebruikers.php');
    exit(); 
} else {
    echo "Error updating user";
}