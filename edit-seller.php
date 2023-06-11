<?php 

require "views/seller-view.php";
require "classes/seller-model.php";
require "classes/garment-model.php";


$pdo = require "partials/connect.php";

$sellerModel = new SellerModel($pdo);
$editSellerView = new EditSellerView();


include "partials/header.php";
include "partials/nav.php";


$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if($id == true) {
    $sellerViewEx->renderSellerEditForm($sellerModel->updateSeller($id));;
} else {
   echo "något gick fel";
}

include "partials/footer.php";

?>