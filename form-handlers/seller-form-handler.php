<?php 
require "../classes/seller-model.php";
$pdo = require "../partials/connect.php";

$sellerModel = new SellersModel(require "../partials/connect.php");

if(isset($_POST['first_name'], $_POST['last_name'], $_POST['email'])) {
    $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);

    $sellerModel->addSeller($first_name, $last_name, $email);
}

header("Location: ../sellers.php");
?>