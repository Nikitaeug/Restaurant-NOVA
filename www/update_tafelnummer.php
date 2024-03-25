<?php
session_start();
require "database.php";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    // Handle the case where "id" is not set in the session
    exit('Invalid request.');
}
$gebruiker_id = $_POST['gebruiker_id'];
$tafelnummer = $_POST['tafelnummer'];

$sql = "UPDATE Reservering SET tafelnummer = :tafelnummer WHERE gebruiker_id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':tafelnummer', $tafelnummer);
$stmt->bindParam(':id', $gebruiker_id);
$stmt->execute();

if ($stmt->execute()) {
    header('location: reserveringen.php');
    exit(); 
} else {
    echo "Error updating";
}

?>

