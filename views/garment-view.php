<?php
require_once "classes/seller-model.php";

class GarmentView {
    public function renderAllGarments(array $garments){
        echo "<h4>Lägg till plagg</h4>";
        echo "<table class='list'>
  	    <tr>
        <th>Plagg</th>
        <th>Pris</th>
        <th>Datum</th>
  	    <th>Lager status</th>
  	    <th>Säljare</th>
  	    <th>&nbsp;</th>
       
  	  </tr>";
         foreach($garments as $garment) {
                $id = $garment['seller_id'];
                $url = "show-seller.php?id=" . $id;
            echo "<tr>";
            echo "<td>{$garment["garment"]}</td>";
            echo "<td>{$garment["price"]} kr</td>";
            echo "<td>{$garment["date_added"]}</td>";
            if($garment['sold_status'] == true){
                     echo "<td>Såld✅</td>";
                     } else {
                        echo "<td>Inte såld</td>";
                     }
            echo "<td><a href='$url'>{$garment["seller_id"]}</td></a>";
            echo "<td><a class='action' href='?seller-id={$garment['seller_id']}&action=update'>Updatera</a></td>";
            // echo "<td><a class='action' href='?seller-id={$garment['seller_id']}&action=delete'>Ta bort</a></td>";
            echo "</tr>";
     }
     echo "</table";
}
}
