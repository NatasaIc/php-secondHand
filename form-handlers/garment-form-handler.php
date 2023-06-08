<?php 
require_once "../classes/garment-model.php";

$garmentModel = new GarmentModel(require_once "../partials/connect.php");

if(isset($_POST['garment'], $_POST['price'], $_POST['date_added'], $_POST['sold_status'], $_POST['seller_id'])) {
    $garment = filter_var($_POST['garment'], FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
    $date_added = filter_var($_POST['date_added'], FILTER_SANITIZE_SPECIAL_CHARS);
    $sold_status = filter_var($_POST['sold_status'], FILTER_VALIDATE_BOOLEAN);
    $sellerId = filter_var($_POST['seller_id'], FILTER_SANITIZE_NUMBER_INT);

    $garmentModel->addGarment($garment, $price, $date_added, $sold_status, $sellerId);
}

header("Location: ../garments.php");
?>