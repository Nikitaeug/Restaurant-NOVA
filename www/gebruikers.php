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

// Check if there are any users
if ($stmt->rowCount() > 0) {
    // Fetch all users as an associative array
    $gebruikers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $gebruikers = [];

}
?>
<h2><a href="reg.php">Gebruiker toevoegen</a></h2>
<style>
    h2 a {
        text-decoration: none;
        color: black;
    }
</style>

<table>
    <thead>
    <tr>
        <th>Gebruikers ID</th>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Aanpassen</th>
        <th>Verwijderen</th>
    </tr>
    </thead>
    <?php foreach ($gebruikers as $gebruiker) : ?>
        <tr>
            <tbody>
            <td><?php echo $gebruiker['gebruiker_id']; ?></td>
            <td><?php echo $gebruiker['voornaam']; ?></td>
            <td><?php echo $gebruiker['achternaam']; ?></td>
            <td><?php echo $gebruiker['email']; ?></td>
            <td><?php echo $gebruiker['rol']; ?></td>
            <td>
                <?php
                if ($_SESSION['rol'] == 'admin' || ($_SESSION['rol'] == 'manager' && ($gebruiker['rol'] == 'klant' || $gebruiker['rol'] == 'manager'))) {
                    echo '<a href="edit-user.php?id=' . $gebruiker['gebruiker_id'] . '">Aanpassen</a>';
                }
                ?>
            </td>
            <td><a href="delete-user.php?id=<?php echo $gebruiker['gebruiker_id']; ?>">Verwijderen</a></td>
            </tbody>
        </tr>
    <?php endforeach; ?>
</table>