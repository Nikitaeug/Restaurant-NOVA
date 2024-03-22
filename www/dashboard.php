<?php 
session_start();
require "database.php";


if ($_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'manager') {
    header('Location: login.php');
    exit();
}
include "header.php";

$sql = "SELECT * FROM Gebruiker";
$stmt = $conn->prepare($sql);
$stmt->execute();

include "footer.php";
?>
<div class="links">
    Links:
    <a href="gebruikers.php">Gebruikers</a>
    <a href="reserveringen.php">Reserveringen</a>
</div>
<div class="dashboard">
<ul>
    <li> aantal Gebruikers: <?php echo $stmt->rowCount(); ?> </li>
    <li> aantal reserveringen: <?php  ?></li>
</ul>
</div>
