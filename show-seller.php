<?php

require_once 'classes/seller-model.php';
require_once 'views/seller-view-ex.php';
require_once 'classes/garment-model.php';

$pdo = require 'partials/connect.php';

$sellerModel = new SellerModel($pdo);
$showSellerView = new ShowSellerView($pdo);

include "partials/header.php";
include "partials/nav.php";

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if($id == true) {
    $showSellerView->renderChosenSellerInfo($sellerModel->getSellerWithGarments($id));
} else {
   echo "något gick fel";
}

 include 'partials/footer.php';