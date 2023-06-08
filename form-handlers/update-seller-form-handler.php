<?php

require '../classes/seller-model.php';
$sellerModel = new SellerModel(require '../partials/connect.php');

if((isset($_POST["seller_id"], $_POST["first_name"], $_POST["last_name"], $_POST["email"])) 
    && $_POST["first_name"] !== "" 
    && $_POST["last_name"] !== "" 
    && $_POST["email"] !== "" ){
    $sellerId = filter_var((int)$_POST['seller_id'], FILTER_SANITIZE_NUMBER_INT);
    $firstName = filter_var($_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_var($_POST["last_name"], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_SPECIAL_CHARS);
    $sellerModel->editSeller($firstName, $lastName, $email, $userId);
}
header("Location: ../sellers.php");