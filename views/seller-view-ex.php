<?php 
require_once 'classes/seller-model.php';
require_once 'classes/garment-model.php';

class SellerViewEx {
    private $garmentModel;

    public function __construct(PDO $pdo) {
        $this->garmentModel = new GarmentModel($pdo);
    }

    public function renderChosenSellerInfo(array $seller) {
                echo "<section class='show-seller'>";
                echo "<div class='seller-info'>";
                echo "<h2>Info om säljaren</h2>";
                echo "<ul>";
                    echo "<li><strong>Förnamn: </strong> {$seller['first_name']} </li>";
                    echo "<li><strong>Efternamn: </strong> {$seller['last_name']} </li>";
                    echo "<li><strong>Email: </strong> {$seller['email']}</li>";
                echo "</ul>";
                echo "</div>";

               echo "<div class='seller-garment'>";
                echo "<h4>Säljarens plagg</h4>";
                foreach($seller['garments'] as $garment) {
                    echo "<p>Titel: {$garment['garment']}</p>";
                    echo "<p>Pris: {$garment['price']} kr</p>";
                    echo "<p>Datum: {$garment['date_added']}</p>";
                     if($garment['sold_status'] == true){
                     echo "<span>Status: Såld✅</span>";
                     } else {
                        echo "<span>Inte såld</span>";
                     }
                
                     echo "<hr>";
                }
                echo "</div>";
                echo "</section>";
    }
}