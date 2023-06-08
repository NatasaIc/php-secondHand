<?php
require "views/garment-view.php";
require "classes/garment-model.php";



$pdo = require "partials/connect.php";

$garmentModel = new GarmentModel($pdo);
$garmentView = new GarmentView();
$sellerModel = new SellerModel($pdo);

include "partials/header.php";
include "partials/nav.php";



$garmentView->renderAllGarments($garmentModel->getAllGarments());

$sellers = $sellerModel->getAllSellers();

include 'partials/garment-form.php';

include "partials/footer.php";