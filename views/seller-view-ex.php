<?php 

require_once 'classes/seller-model.php';
require_once 'classes/garment-model.php';

class SellerViewEx {
    private $garmentModel;

    public function __construct(PDO $pdo) {
        $this->garmentModel = new garmentModel($pdo);
    }

    public function renderChosenSellerInfo(array $seller) {
                echo "<a href='sellers.php'>&laquo; backa till säljare</a>";
                echo "<h2>Info om säljaren</h2>";
                echo "<ul>";
                    echo "<li><strong>Förnamn: </strong> {$seller['first_name']} </li>";
                    echo "<li><strong>Efternamn: </strong> {$seller['last_name']} </li>";
                    echo "<li><strong>Email: </strong> {$seller['email']}</li>";
                echo "</ul>";

                $id = $seller['id'];
                
                foreach($seller['garments'] as $garment) {
                    echo "<h3> Titel: {$garment['garment']} Pris:{$garment['price']} Datum:{$garment['date_added']}</h3>";
                     if($garment['sold_status'] == true){;
                     echo "<span>Status: Såld✅</span>";
                     }
                }
    }
}