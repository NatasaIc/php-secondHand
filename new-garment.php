<?php
require "classes/garment-model.php";
require "views/garment-view.php";
require_once "classes/seller-model.php";


$pdo = require "partials/connect.php";

$garmentModel = new GarmentModel($pdo);
$sellerModel = new SellerModel($pdo);

include "partials/header.php";
include "partials/nav.php";

$sellers = $sellerModel->getAllSellers();

require 'partials/garment-form.php';

include "partials/footer.php";