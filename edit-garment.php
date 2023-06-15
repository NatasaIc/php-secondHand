<?php
require_once "classes/garment-model.php";

$pdo = require "partials/connect.php";

$garmentModel = new GarmentModel($pdo);

include "partials/header.php";
include "partials/nav.php";

$garmentId = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if($garmentId == true) {
 include "partials/edit-garment-form.php";
}
   
include "partials/footer.php";
