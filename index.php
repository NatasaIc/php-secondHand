<?php 
require "classes/garment-model.php";
require "views/seller-view-ex.php";
require_once "classes/seller-model.php";


$pdo = require "partials/connect.php";

$garmentModel = new GarmentModel($pdo);
$statusView= new ShowSellerView($pdo);

include "partials/header.php";
include "partials/nav.php";

$statusView->renderStatusIndex($garmentModel->getSoldGarmentCount());


include "partials/footer.php";

?>