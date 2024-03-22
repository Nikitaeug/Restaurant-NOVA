<?php
session_start();
require 'database.php';
include 'header.php';

$sql = "SELECT * FROM Gebruiker JOIN Adres ON Gebruiker.adres_id = Adres.adres_id";
$stmt = $conn->prepare($sql);
$stmt->execute();

$gebruikers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="profile-section">
    <div class="profile-info">
    <?php
            foreach ($gebruikers as $gebruiker) {
                }
                echo "<h2>" . $gebruiker['voornaam'] . "</h2>";
                echo "<p>Achternaam: " . $gebruiker['achternaam'] . "</p>";
                echo "<p>Email: " . $gebruiker['email'] . "</p>";
                echo "<p>Adres: " . $gebruiker['straat'] . " " . $gebruiker['huisnummer'] . ", " . $gebruiker['postcode'] . " " . $gebruiker['plaats'] . "</p>";
                echo "<td><a href=\"edit-user.php?id=" . $gebruiker['gebruiker_id'] . "\">Aanpassen</a></td><br>";
                echo "<td><a href=\"delete-user.php?id=" . $gebruiker['gebruiker_id'] . "\">Verwijder je profiel</a></td>";
        ?>
    </div>
</div>