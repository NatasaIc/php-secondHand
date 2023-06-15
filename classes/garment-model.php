<?php

require_once "db.php";

class GarmentModel extends DB {
    protected $table = "garments";
        //Hämta alla plagg
        public function getAllGarments() {
        $sql = "SELECT * FROM $this->table ORDER BY garment ASC ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        //Lägg till nytt plagg med säljare
        public function addGarment(string $garment, int $price, int $sellerId) {
            $added = date('Y-m-d');
            $sql = "INSERT INTO garments (garment, price, date_added, seller_id) VALUES (?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$garment, $price, $added, $sellerId]);
        }
        //Uppdatera status till såld
         public function updateToSold(int $garmentId): void {
            $sql = "UPDATE garments SET sold_status = true, sold_date = CURRENT_DATE() WHERE id = :garmentId";
            $stmt = $this->pdo->prepare($sql); 
            $stmt->bindParam(':garmentId', $garmentId);
            $stmt->execute();
        }
        //Antalet plagg från vald säljare
         public function getCountGarments($sellerId) {
            $sql = "SELECT COUNT(*) AS total FROM garments WHERE seller_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$sellerId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['total'];
        }
        //Totala priset för plaggen av vald säljare såld eller ej
         public function getTotalCost($sellerId){
            $sql = "SELECT SUM(price) AS totalCost FROM garments WHERE seller_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$sellerId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['totalCost'];
        }
        //Intäkt från vald säljare
         public function getEarningsPerSeller($sellerId) {
            $sql = "SELECT SUM(price) AS earnings FROM garments WHERE seller_id = ? AND sold_status IS True";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$sellerId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
            return $result['earnings'];
        }
        //Intäkter från alla sålda plagg
          public function getTotalSum(){
            $sql = "SELECT SUM(price) AS totalSum FROM garments WHERE sold_status IS True";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['totalSum'];
        }
        //Totalt antal sålda plagg
         public function getSoldGarmentCount() {
            $sql = "SELECT COUNT(*) AS count FROM garments WHERE sold_status IS True";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $result['count'];

            return $count;
        }
         //Totalt antal sålda plagg
         public function getGarmentCount() {
            $sql = "SELECT COUNT(*) AS count FROM garments WHERE id IS NOT NULL";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $result['count'];

            return $count;
        }

        public function getDaysInStock() {
            $sql = "SELECT DATEDIFF(CURDATE(), date_added) FROM garments";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

}

