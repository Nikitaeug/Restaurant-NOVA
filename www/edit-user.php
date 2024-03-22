<?php 
session_start();
require "database.php";

include "header.php";
$id = $_GET['id'];
$_SESSION['id'] = $id;

$sql = "SELECT * FROM Gebruiker JOIN Adres ON Gebruiker.adres_id = Adres.adres_id WHERE gebruiker_id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<main>

<h1>Gebruiker aanpassen</h1>
<div class="container">

    <form action="edit-user-process.php" method="post">
        <div class="form-group">

            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $user['email'] ?>">
        </div>
        <div class="form-group">
            <a href="resetpassword.php">password reset</a>
        </div>
        <div class="form-group-invis">
            <input type="password" name="wachtwoord" placeholder="wachtwoord">
        </div>
        <div class="form-group">
            <label for="voornaam">voornaam</label>
            <input type="text" name="voornaam" value="<?php echo $user['voornaam'] ?>">
        </div>
        <div class="form-group">
            <label for="achternaam">achternaam</label>
            <input type="text" name="achternaam" value="<?php echo $user['achternaam'] ?>">
        </div>
        <?php if ($_SESSION['rol'] == 'admin') {
            echo '<div class="form-group
            <label for="Rol">Rol</label>
            <select name="Rol" id="Rol">
                <option value="' . $user['rol'] . '" disabled>' . $user['rol'] . '</option>
                <option value="admin">admin</option>
                <option value="manager">manager</option>
                <option value="klant">klant</option>
            </select>
        </div>';
        } ?>
        <?php if ($_SESSION['rol'] == 'manager') {
            echo '<div class="form-group
            <label for="Rol">Rol</label>
            <select name="Rol" id="Rol">
                <option value="' . $user['rol'] . '" disabled>' . $user['rol'] . '</option>
                <option value="manager">manager</option>
                <option value="klant">klant</option>
            </select>
        </div>';
        } ?>
            <div class="form-group">
            <label for="straat">straat</label>
            <input type="text" name="straat" value="<?php echo $user['straat'] ?>">
            </div>
            <div class="form-group">
            <label for="huisnummer">huisnummer</label>
            <input type="text" name="huisnummer" value="<?php echo $user['huisnummer'] ?>">
            </div>
            <div class="form-group">
            <label for="plaats">plaats</label>
            <input type="text" name="plaats" value="<?php echo $user['plaats'] ?>">
            </div>
            <div class="form-group">
            <label for="postcode">postcode</label>
            <input type="text" name="postcode" value="<?php echo $user['postcode'] ?>">
            </div>
        <button type="submit">Aanpassen</button>
        <a href="reg.php">Geen account nog?</a>
    </form>
</div>
</main>

<style>
    .form-group-invis {
        visibility: hidden;
        border-radius: none;
        width: 1px;
        height: 0px;
    }
</style>