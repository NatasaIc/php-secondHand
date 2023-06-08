<?php
require "views/garment-view.php";
require "classes/garment-model.php";



$pdo = require "partials/connect.php";

$garmentModel = new GarmentModel($pdo);
$garmentView = new GarmentView();

include "partials/header.php";
include "partials/nav.php";

$garmentView->renderAllGarments($garmentModel->getAllGarments());
require 'partials/garment-form.php';

include "partials/footer.php";