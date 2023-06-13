<?php 
require_once "../classes/garment-model.php";
$pdo = require "../partials/connect.php";

$garmentModel = new GarmentModel($pdo);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
if((isset($_POST["sold_status"]))
    && !empty($_POST["sold_status"])){
    $status = filter_var($_POST["sold_status"], FILTER_VALIDATE_BOOLEAN);

    $garmentModel->updateToSold($status);
}
}

header("Location: ../index.php");
?>