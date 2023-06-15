<?php 
require_once "../classes/garment-model.php";

$garmentModel = new GarmentModel(require_once '../partials/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

if(isset($_POST['garmentId'])){
    $garmentId = filter_var($_POST['garmentId'],  FILTER_SANITIZE_NUMBER_INT);

    $garmentModel->updateToSold($garmentId);

    header('Location: ../index.php');
    exit;
    }
}
?>