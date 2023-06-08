<?php

require_once 'classes/seller-model.php';
require_once 'views/seller-view-ex.php';

$pdo = require 'partials/connect.php';

$sellerModel = new SellerModel($pdo);
$sellerViewEx = new sellerViewEx($pdo);

include "partials/header.php";
include "partials/nav.php";

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if($id !== false) {
    $sellerViewEx->renderChosenSellerInfo($sellerModel->getSellerWithGarments($id));
} else {
   echo "inget hämtat";
}

 include 'partials/footer.php';