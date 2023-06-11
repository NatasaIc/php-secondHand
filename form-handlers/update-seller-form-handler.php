<?php

require_once '../classes/seller-model.php';
$sellerModel = new SellerModel(require_once '../partials/connect.php');

if((isset($_POST["id"], $_POST["first_name"], $_POST["last_name"], $_POST["email"]))
    && (!empty($_POST["id"]) 
    && !empty($_POST["first_name"]) 
    && !empty($_POST["last_name"]) 
    && !empty($_POST["email"]))) {
    $sellerId = filter_var((int)$_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstName = filter_var($_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_var($_POST["last_name"], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_SPECIAL_CHARS);

    $sellerModel->editSeller($sellerId, $firstName, $lastName, $email);
}
header("Location: ../sellers.php");