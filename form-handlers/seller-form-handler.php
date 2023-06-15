<?php 
require_once "../classes/seller-model.php";

$sellerModel = new SellerModel(require_once '../partials/connect.php');

if((isset($_POST['first_name'], $_POST['last_name'], $_POST['email']))
    && !empty($_POST["first_name"]) 
    && !empty($_POST["last_name"]) 
    && !empty($_POST["email"])) {
    $firstname = filter_var($_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_var($_POST['last_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);

    $sellerModel->addSeller($firstname, $lastname, $email);
}

header("Location: ../new-garment.php");

?>