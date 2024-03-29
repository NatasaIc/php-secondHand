<?php
require "classes/garment-model.php";
require "views/garment-view.php";


$pdo = require "partials/connect.php";

$garmentModel = new GarmentModel($pdo);
$garmentView = new GarmentView();


include "partials/header.php";
include "partials/nav.php";

$garmentView->renderAllGarments($garmentModel->getAllGarments());

include "partials/footer.php";