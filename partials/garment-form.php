<?php 
require_once 'classes/garment-model.php';
require_once 'classes/seller-model.php';
$garmentModel = new GarmentModel(connect($host, $db, $user, $password));

?>

<form action="form-handlers/garment-form-handler.php" method="post">

<label for="garment">Plagg titel: </label>
<input type="text" name="garment" id="garment">

<label for="size">Pris: </label>
<input type="text" name="price" id="price">

<label for="date">Datum: </label>
<input type="date" name="date_added" id="date_added">


        <label for="seller">Säljare:</label>
        <select name="seller-id" id="seller">
            <option value="">--Välj säljare--</option>

            <?php
            $sellers = $sellerModel->getAllSellers();
            foreach ($sellers as $seller) {
                echo "<option value='{$seller['id']}'>
                    {$seller['first_name']} {$seller['last_name']}
                </option>";
            }
            ?>

        </select>
    

<button type="submit">Lägg till plagg</button>
</form>

 