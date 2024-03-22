<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['wachtwoord'])) {
        if (!empty($_POST['email']) && !empty($_POST['wachtwoord'])) {
            $emailForm = $_POST['email'];
            $passwordForm = $_POST['wachtwoord'];

            require 'database.php'; 

            $stmt = $conn->prepare("SELECT * FROM Gebruiker WHERE email=:email");
            $stmt->bindParam(':email', $emailForm);
            $stmt->execute();

            //als de email bestaat dan is het resultaat groter dan 0
            if ($stmt->rowCount() > 0) {
                //resultaat gevonden? Dan maken we een user-array $dbuser
                $dbuser = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (password_verify($passwordForm, $dbuser['wachtwoord'])) {
                    session_start();
                    $_SESSION['id']    = $dbuser['gebruiker_id'];
                    $_SESSION['email']      = $dbuser['email'];
                    $_SESSION['voornaam']  = $dbuser['voornaam'];
                    $_SESSION['achternaam']   = $dbuser['achternaam'];
                    $_SESSION['rol']       = $dbuser['rol'];
                    // echo "You are logged in";
                    if ($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'manager') {
                        header("Location: dashboard.php");
                    exit;
                    }
                    else {
                        header("Location: home.php");
                    exit;
                    }
                    
                } else {
                    include 'header.php';
                    $_GET['message'] = 'wrongpassword';
                    include 'login-message.php';
                    include 'footer.php';
                    exit;
                }
            } else {
                include 'header.php';
                $_GET['message'] = 'usernotfound';
                include 'login-message.php';
                include 'footer.php';
                exit;
            }
        }
    }
}

include 'footer.php';
