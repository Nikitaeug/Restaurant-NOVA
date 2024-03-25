<?php
session_start();
require "database.php";
include "header.php";

if ($_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'manager') {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM Reservering";
$stmt = $conn->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $reserveringen = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $reserveringen = [];
}
?>

<h1>Reserveringen</h1>
<div>
    <table>
        <thead>
        <tr>
            <th>Reservering ID</th>
            <th>Aantal personen</th>
            <th>Datum</th>
            <th>Tijd</th>
            <th>Gebruiker ID</th>
            <th>Tafelnummer</th>

            <th>Verwijderen</th>
        </tr>
        </thead>
        <?php foreach ($reserveringen as $reservering) : ?>
            <tr>
                <tbody>
                <td><?php echo $reservering['reservering_id']; ?></td>
                <td><?php echo $reservering['aantal_personen']; ?></td>
                <td><?php echo $reservering['datum']; ?></td>
                <td><?php echo $reservering['tijd']; ?></td>
                <td><?php echo $reservering['gebruiker_id']; ?></td>
                <td>
                <form method="post" action="update_tafelnummer.php">
                <select name="tafelnummer" id="tafelnummer-<?php echo $reservering['reservering_id']; ?>">
                    <option value="0" hidden>0</option>
                    <?php for ($i = 1; $i <= 15; $i++) : ?>
                        <option value="<?php echo $i; ?>" <?php if ($i == $reservering['tafelnummer']) echo 'selected'; ?>>
                            <?php echo $i; ?>
                        </option>
                    <?php endfor; ?>
                </select>
                <input type="hidden" name="reservering_id" value="<?php echo $reservering['reservering_id']; ?>">
                <input type="hidden" name="gebruiker_id" value="<?php echo $reservering['gebruiker_id']; ?>">
                <button type="submit">Update</button>
                </form>
                </td>
                <td><a href="delete-reservering.php?id=<?php echo $reservering['reservering_id']; ?>">Verwijderen</a></td>
            </tr>
        <?php endforeach; ?>
    </table>