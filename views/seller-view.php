<?php

    require_once 'classes/seller-model.php';
   

    class SellerView {

    public function renderAllSellers(array $sellers): void{
        echo "<h4>Lägg till säljare och plagg</h4>";
        echo "<table class='list'>
  	    <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
  	    <th>Email</th>
  	    <th>plagg</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>";
        foreach($sellers as $seller) {
                $id = $seller['id'];
                $url = "show-seller.php?id=" . $id;

            echo "<tr>";
            echo "<td>{$seller["id"]}</td>";
            echo "<td>{$seller["first_name"]}</td>";
            echo "<td>{$seller["last_name"]}</td>";
            echo "<td>{$seller["email"]}</td>";
            echo "<td><a class='action' href='$url'>View</a></td>";
            echo "<td><a class='action' href='?seller-id={$seller['id']}&action=update'>Edit</a></td>";
            echo "<td><a class='action' href='?seller-id={$seller['id']}&action=delete'>Delete</a></td>";
     }
     echo "</table";
    }

        public function renderDeleteMessage() {
        echo "<section>";
            echo "<h3>Användaren raderad✅</h3>";
            // echo "<a href='users.php'>Tillbaka</a>";
        echo "</section>";
    }

     public function renderEditSellerForm(array $seller) {
        echo "<form action='form-handlers/update-seller-form-handler.php' method='POST'>";
        echo "<div>
                    <label for='seller_id'>Säljarens ID:</label>
                    <input value='{$seller['id']}' type='text' id='seller_id' name='seller_id' readonly='readonly'>
                </div>
                <div>
                <label for='first_name'>Förnamn:</label>
                    <input value='{$seller['first_name']}' type='text' id='first_name' name='first_name'>
                </div>
                <div>
                <label for='last_name'>Efternamn:</label>
                    <input value='{$seller['last_name']}' type='text' id='last_name' name='last_name'>
                </div>
                <div>
                <label for='email'>Epost:</label>
                <input value='{$seller['email']}' type='email' id='email' name='email'>
                </div>
                <div>";
        echo "<button class='btn'>Uppdatera</button>";
        echo "</form>";
    }
    }

