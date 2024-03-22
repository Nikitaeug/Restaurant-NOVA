<?php 
require "database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
    $straat = $_POST['straat'];
    $huisnummer = $_POST['huisnummer'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    try {
    // Insert address into Adres table
    $sqladres = "INSERT INTO Adres (straat, huisnummer, postcode, plaats) VALUES (:straat, :huisnummer, :postcode, :plaats)";
    $stmt = $conn->prepare($sqladres);
    $stmt->bindParam(':straat', $straat);
    $stmt->bindParam(':huisnummer', $huisnummer);
    $stmt->bindParam(':postcode', $postcode);
    $stmt->bindParam(':plaats', $plaats);
    $stmt->execute();

    // Get the last inserted address ID
    $lastInsertId = $conn->lastInsertId();

    // Insert user into Gebruiker table
    $sqlgebruiker = "INSERT INTO Gebruiker (email, voornaam, achternaam, wachtwoord, adres_id) VALUES (:email, :voornaam, :achternaam, :wachtwoord, :adres_id)";
    $stmt = $conn->prepare($sqlgebruiker);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':voornaam', $voornaam);
    $stmt->bindParam(':achternaam', $achternaam);
    $stmt->bindParam(':wachtwoord', $wachtwoord);
    $stmt->bindParam(':adres_id', $lastInsertId);
    $stmt->execute();

    // Redirect to login page after successful insertion
    if ($stmt->rowCount() > 0) {
        header("Location: login.php");
        exit;
    } else {
        echo "Error";
    }
}catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        echo "The email already exists.";
    } else {
        throw $e;
    }
}
}
