<?php

    require_once 'classes/seller-model.php';
    require_once 'classes/garment-model.php';

    class SellerView {

    public function renderAllSellers(array $sellers): void{
        echo "<section class='all-sellers'>";
        echo "<h4>Lägg till säljare</h4>";
        echo "<table class='list'>
  	    <tr>
        <th>ID</th>
        <th>Förnamn</th>
        <th>Efternamn</th>
  	    <th>Email</th>
  	    <th>plagg</th>
  	  </tr>";
        foreach($sellers as $seller) {
                $id = $seller['id'];
                $url = "show-seller.php?id=" . $id;
                $urlEdit = "edit-seller.php?id=" . $id . "&action=update";
            echo "<tr>";
            echo "<td>{$seller["id"]}</td>";
            echo "<td>{$seller["first_name"]}</td>";
            echo "<td>{$seller["last_name"]}</td>";
            echo "<td>{$seller["email"]}</td>";
            echo "<td><a class='action' href='$url'>Visa</a></td>";
            // echo "<td><a class='action' href='$urlEdit'>Updatera</a></td>";
     }
     echo "</table";
     echo "</section>";
    }
    }