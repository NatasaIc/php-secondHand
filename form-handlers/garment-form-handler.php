<?php 
require_once "../classes/garment-model.php";
$pdo = require "../partials/connect.php";

$garmentModel = new GarmentModel(require "../partials/connect.php");

if(isset($_POST['garment'], $_POST['price'], $_POST['date_added'])) {
    $garment = filter_var($_POST['garment'], FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
    $date_added = filter_var($_POST['date_added'], FILTER_SANITIZE_SPECIAL_CHARS);

    $garmentModel->addGarment($garment, $price, $date_added);
}

header("Location: ../garments.php");
?>