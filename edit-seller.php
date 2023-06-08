<?php 

require "views/seller-view.php";
require "classes/seller-model.php";


$pdo = require "partials/connect.php";

$sellerModel = new SellerModel($pdo);
$sellerView = new SellerView();


include "partials/header.php";
include "partials/nav.php";

$sellerView->renderEditSellerForm($sellerModel->updateSeller());

include "partials/footer.php";

?>