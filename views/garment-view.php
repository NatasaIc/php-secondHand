<?php
require_once "classes/seller-model.php";

class GarmentView {
    public function renderAllGarments(array $garments){
        foreach($garments as $garment) {
            echo "<li>{$garment["id"]} {$garment["garment"]} {$garment["price"]} kr {$garment["date_added"]} {$garment["sold_status"]} Säljare: {$garment["seller_id"]} ";
        }
        echo "<li>";
    }
}