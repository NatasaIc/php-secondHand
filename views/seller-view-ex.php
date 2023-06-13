<?php 
require_once 'classes/seller-model.php';
require_once 'classes/garment-model.php';

class ShowSellerView {
    private $garmentModel;

    public function __construct(PDO $pdo) {
        $this->garmentModel = new GarmentModel($pdo);
    }

    public function renderChosenSellerInfo(array $seller) {
                $sellerId = $seller['id'];
                $totlaGarments = $this->garmentModel->getCountGarments($sellerId);
                $garmentCost = $seller['id'];
                $garmentSum = $seller['id'];

                echo "<section class='show-seller'>";
                echo "<div class='seller-info'>
                            <h2>Info om säljaren</h2>
                        
                            <p><strong>Förnamn: </strong> {$seller['first_name']} </p>
                            <p><strong>Efternamn: </strong> {$seller['last_name']} </p>
                            <p><strong>Email: </strong> {$seller['email']}</p>
                        
                        </div>";

                echo "<div class='seller-garment'>";
                echo "<div>
                    <h3>Antal Plagg</h3>
                    <p>Säljaren har {$totlaGarments} plagg</p>
                    </div>";
                foreach($seller['garments'] as $garment) {
                    echo "<p class='item'>Titel: {$garment['garment']}</p>";
                    echo "<p class='item'>Pris: {$garment['price']} kr</p>";
                    echo "<p class='item'>Datum: {$garment['date_added']}</p>";
                     if($garment['sold_status'] == true){
                     echo "<span class='item'>Status: Såld✅</span>";
                     } else {
                        echo "<span class='item'>Inte såld</span>";
                     }
                
                     echo "<hr>";
                     $totalCost = $this->garmentModel->getTotalCost($garmentCost);
                     $earningsSum = $this->garmentModel->getEarningsPerSeller($garmentSum);
                }
                echo "<p class='item'>Totalt pris: {$totalCost} kr</p>";
                if($earningsSum == NULL) {
                    echo "<p class='item'>Intäkt: 0 kr</p>";
                    } else {
                        echo "<p class='item'>Intäkt: {$earningsSum} kr</p>";
                    }
                echo "</div>";
                echo "</section>";
    }

    public function renderStatusIndex() {
        $countSoldGarments = $this->garmentModel->getSoldGarmentCount();
        $soldGarments = $this->garmentModel->getTotalSum();

        echo "<div class='index-container'>
        <h3>{$countSoldGarments} sålda plagg</h3>
        <h3>Intäkt:</h3><span class='kr-span'> {$soldGarments} kr</span>
        </div>";
    }
}