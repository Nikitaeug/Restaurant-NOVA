<?php
session_start();

require "database.php";

if ($_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'manager') {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // Handle the case where "id" is not set in the session
    exit('Invalid request.');
}

$sql = "DELETE FROM Reservering WHERE reservering_id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();


if ($stmt->rowCount() > 0) {
    header('location: reserveringen.php');
    exit();
} else {
    echo "Error deleting reservering";
}
?>