<?php 
session_start();
require "database.php";


if ($_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'manager') {
    header('Location: login.php');
    exit();
}
include "header.php";

$sql = "SELECT * FROM Reservering";
$stmt = $conn->prepare($sql);
$stmt->execute();
$reservationCount = $stmt->rowCount();

$sql = "SELECT * FROM Gebruiker";
$stmt = $conn->prepare($sql);
$stmt->execute();
$userCount = $stmt->rowCount();
?>
<div class="background-image3">
<main>
    <h1>Dashboard</h1>
    <div class="dashboard2">
    <div class="dashboard-item">
<div class="links">
    <a href="reserveringen.php">Reserveringen</a>
    </div>
</div>
<div class="dashboard-item">
    aantal reserveringen: <?php echo $reservationCount; ?>
</div>
<div class="dashboard-item">
    aantal Gebruikers: <?php echo $userCount; ?>
</div>
</div>
</main>
</div>
<style>
h1{
        color:white;}
</style>