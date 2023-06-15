<?php 
require_once "../classes/garment-model.php";

$garmentModel = new GarmentModel(require_once '../partials/connect.php');

if((isset($_POST['garment'], $_POST['price'], $_POST['seller_id'])
    && !empty($_POST["garment"]) 
    && !empty($_POST["price"])
    && !empty($_POST["seller_id"]))){
    $garment = filter_var($_POST['garment'], FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_var($_POST['price'], FILTER_VALIDATE_INT);
    $sellerId = filter_var($_POST['seller_id'], FILTER_VALIDATE_INT);
    $garmentModel->addGarment($garment, $price, $sellerId);
}

header('Location: ../garments.php');

?>