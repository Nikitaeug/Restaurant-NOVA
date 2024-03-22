<?php
session_start();
require "database.php";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    // Handle the case where "id" is not set in the session
    exit('Invalid request.');
}
if (isset($_POST['submit'])) {
    $owachtwoord = $_POST['owachtwoord'];
    $nwachtwoord = $_POST['nwachtwoord'];
    $nhwachtwoord = $_POST['nhwachtwoord'];
    if ($nwachtwoord != $nhwachtwoord) {
        echo "Wachtwoorden komen niet overeen";
    } else {
        $sql = "SELECT * FROM Gebruiker WHERE gebruiker_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch();
        if (password_verify($owachtwoord, $user['wachtwoord'])) {
            $hash = password_hash($nwachtwoord, PASSWORD_DEFAULT);
            $sql = "UPDATE Gebruiker SET wachtwoord = :wachtwoord WHERE gebruiker_id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':wachtwoord', $hash);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } else {
            echo "Oude wachtwoord is niet correct";
        }
    }
}
if($stmt->execute()){
    header("Location: login.php");
    exit();
} else {
    echo "Er is iets fout gegaan";
}
?>