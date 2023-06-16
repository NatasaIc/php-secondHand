<?php
require_once "classes/seller-model.php";
require_once 'classes/garment-model.php';

class GarmentView {
    public function renderAllGarments(array $garments){
        echo "<a class='garment-link' href='new-garment.php'>Lägg till plagg</a>";
        echo "<table class='list'>
  	    <tr>
        <th>Plagg</th>
        <th>Pris</th>
        <th>Skapad</th>
  	    <th>Lager status</th>
  	    <th>Såld datum</th>
  	    <th>&nbsp;</th>
       
  	  </tr>";
         foreach($garments as $garment) {
                $id = $garment['id'];
                $sellerId = $garment['seller_id'];
                $urlSeller = "show-seller.php?id=" . $sellerId;
            echo "<tr>";
            echo "<td>{$garment["garment"]}</td>";
            echo "<td>{$garment["price"]} kr</td>";
            echo "<td>{$garment["date_added"]}</td>";
            if($garment['sold_status'] == true){
                     echo "<td>Såld✅</td>";
                     } else {
                        echo "<td>

                        <form class='edit-form' action='form-handlers/update-sold-form.php' method='post'>
                        <input type='hidden' name='garmentId' value='$id'>
                        <input type='submit' value='Köp'>
                        </form>
                        
                        </td>";
                     }
                    echo "<td>{$garment["sold_date"]}</td>";
            echo "<td><a class='action' href='$urlSeller'>Visa</a></td>";
            echo "</tr>";
     }
     echo "</table";
    }
}
