<?php

require_once "classes/seller-model.php";
require_once "views/seller-view.php";

$pdo = require "partials/connect.php";

$sellerModel = new SellerModel($pdo);
$sellerView = new SellerView();

include "partials/header.php";
include "partials/nav.php";

$sellerView->renderAllSellers($sellerModel->getAllSellers());
include "partials/seller-form.php";


include "partials/footer.php";
