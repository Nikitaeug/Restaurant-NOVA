<?php 
session_start();
require "database.php";
if(!isset($_SESSION['rol'])){
    header("Location: login.php");
    exit();
}
include "header.php";
$sql = "SELECT * FROM Gebruiker";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>
<main>
    <h1>Welcome, <?php echo $_SESSION['voornaam'] ?></h1>
    <div class="dashboard">
        <div class="dashboard-item">
            <h2>Reservations</h2>
            <a href="klantreservering.php">View Reservations</a>
        </div>
    </div>
</main>