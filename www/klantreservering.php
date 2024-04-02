<?php
session_start();

require "database.php";

if(!isset($_SESSION['rol'])){
    header("Location: login.php");
    exit();
}

include "header.php";

$sql = "SELECT * FROM Reservering WHERE gebruiker_id = :gebruiker_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":gebruiker_id", $_SESSION['id']);
$stmt->execute();
?>
<main>
    <h1>Reserveringen door jouw:</h1>
    <div class="dashboard">
        <div class="dashboard-item">
            <h2>Reservations</h2>
            <?php if($stmt->rowCount() > 0): ?>
                <table>
                    <tr>
                        <th>Reservering ID</th>
                        <th>Datum</th>
                        <th>Tijd</th>
                        <th>Aantal Personen</th>
                        <th>Tafel</th>
                    </tr>
                    <?php while($row = $stmt->fetch()): ?>
                        <tr>
                            <td><?php echo $row['reservering_id']; ?></td>
                            <td><?php echo $row['datum']; ?></td>
                            <td><?php echo $row['tijd']; ?></td>
                            <td><?php echo $row['aantal_personen']; ?></td>
                            <td><?php echo $row['tafelnummer']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p>No reservations found.</p>
            <?php endif; ?>
        </div>
    </div>
</main>
