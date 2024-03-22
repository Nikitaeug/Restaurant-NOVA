<?php
session_start();
require "database.php";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    // Handle the case where "id" is not set in the session
    exit('Invalid request.');
}
$aantal_personen = $_POST['aantal_personen'];
$datum = $_POST['datum'];
$tijd = $_POST['tijd'];
$email = $_POST['email'];

$sql = "INSERT INTO Reservering (aantal_personen, datum, tijd, email) VALUES (:aantal_personen, :datum, :tijd, :email)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':aantal_personen', $aantal_personen);
$stmt->bindParam(':datum', $datum);
$stmt->bindParam(':tijd', $tijd);
$stmt->bindParam(':email', $email);
$stmt->execute();

if ($stmt->execute()) {
    header('location: reserveren.php');
    exit(); 
} else {
    echo "Error updating user";
}