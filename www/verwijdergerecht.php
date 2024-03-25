<?php
session_start();
require "database.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit('Invalid request.');
}

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    exit('Invalid request.');
}

$product_id = $_POST['product_id'];

$sql = "DELETE FROM Product WHERE product_id = :product_id";
$stmt = $conn->prepare($sql);
$stmt->execute([':product_id' => $product_id]);

header("Location: gerechten.php");
exit();