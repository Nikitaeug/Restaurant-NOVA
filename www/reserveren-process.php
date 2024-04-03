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

$sql = "INSERT INTO Reservering (aantal_personen, datum, tijd, gebruiker_id) VALUES (:aantal_personen, :datum, :tijd, :id)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':aantal_personen', $aantal_personen);
$stmt->bindParam(':datum', $datum);
$stmt->bindParam(':tijd', $tijd);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('location: klantreservering.php');
    exit(); 
} else {
    echo "Error updating user";
}