<?php

class EditSellerView {
    public function renderSellerEditForm() {
        echo "<form action='form-handlers/update-seller-form-handler.php' method='POST'>";
        "<div>
            <label for='id'>Säljarens ID:</label>
            <input value='{$sellers['id']}' type='text' id='id' name='id' readonly='readonly'>
        </div>
        <div>
            <label for='first_name'>Förnamn:</label>
            <input value='{$sellers['first_name']}' type='text' id='first_name' name='first_name'>
        </div>
        <div>
            <label for='last_name'>Efternamn:</label>
            <input value='{$sellers['last_name']}' type='text' id='last_name' name='last_name'>
        </div>
        <div>
            <label for='email'>Epost:</label>
            <input value='{$sellers['email']}' type='email' id='email' name='email'>
        </div>";

        echo "<button type='submit'>Uppdatera</button>";
        echo "</form>";
    }
}