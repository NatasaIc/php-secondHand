<?php 
require_once "../classes/garment-model.php";

$pdo = require "../partials/connect.php";

$garmentModel = new GarmentModel($pdo);

if((isset($_POST["garment"], $_POST["price"], $_POST["date_added"], $_POST["sold_status"], $_POST["seller_id"])) 
    && !empty($_POST["garment"]) 
    && !empty($_POST["price"]) 
    && !empty($_POST["date_added"])
    && !empty($_POST["seller_id"])){
    $garment = filter_var($_POST["garment"], FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_var($_POST["price"], FILTER_SANITIZE_SPECIAL_CHARS);
    $date = filter_var($_POST["date_added"], FILTER_SANITIZE_SPECIAL_CHARS);
    $status = filter_var($_POST["sold_status"], FILTER_VALIDATE_BOOLEAN);
    $sellerId = filter_var($_POST["seller_id"], FILTER_VALIDATE_INT);

    $garmentModel->addGarment($garment, $price, $date, $status, $sellerId);
}

header("Location: ../garments.php");
?>