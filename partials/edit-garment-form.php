<form class='edit-form' action="form-handlers/update-sold-form.php" method="post">

<lable for="id" class="edit-heading">Plagg ID: <?php echo $id; ?></lable>
<label for="sold_status">Markera som såld:</label>
<input type="checkbox" name="sold_status" id="sold_status">


<button type="submit">Uppdatera</button>
</form>