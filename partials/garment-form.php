<form action='form-handlers/garment-form-handler.php' method='post'>

<label for="garment">Plagg titel: </label>
<input type="text" name="garment" id="garment">

<label for="size">Pris: </label>
<input type="text" name="price" id="price">

<label for="date">Datum: </label>
<input type="date" name="date_added" id="date_added">

<label for="date">såld: </label>
<input type="checkbox" name="sold_status" id="date_added">

        <select name="seller_id" id="seller_id">
            <option value="">--Välj säljare--</option>

            <?php

            foreach ($sellers as $seller) {
                echo "<option value='{$seller['id']}'>
                    {$seller['first_name']} {$seller['last_name']}
                </option>";
            }
            ?>

        </select>
    

<button type="submit">Lägg till plagg</button>
</form>

 