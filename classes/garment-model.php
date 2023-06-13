<?php

require_once "db.php";

class GarmentModel extends DB {
    protected $table = "garments";

    public function getAllGarments() {
        return $this->getAll($this->table);
    }

    public function addGarment(string $garment, int $price, int $date, int $status, int $sellerId): void {
        $query = "INSERT INTO garments (`garment`, `price`, `date_added`, `sold_status`, `seller_id`) VALUES (?,?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$garment, $price, $date, $status, $sellerId]);
    }

     public function getCountGarments($sellerId) {
            $query = "SELECT COUNT(*) AS total FROM garments WHERE seller_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$sellerId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['total'];
        }
        
        public function getTotalCost($sellerId){
            $query = "SELECT SUM(price) AS totalCost FROM garments WHERE seller_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$sellerId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['totalCost'];
        }

          public function getEarningsPerSeller($sellerId) {
            $query = "SELECT SUM(price) AS earnings FROM garments WHERE seller_id = ? AND sold_status IS True";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$sellerId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
            return $result['earnings'];
        }


          public function getTotalSum(){
            $query = "SELECT SUM(price) AS totalSum FROM garments WHERE sold_status IS True";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['totalSum'];
        }

        public function getSoldGarmentCount() {
            $query = "SELECT COUNT(*) AS count FROM garments WHERE sold_status IS True";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $result['count'];

            return $count;
        }

        public function updateToSold($garmentId) {
            $query = "UPDATE garments SET sold_status = 1 WHERE id = :id";
            $stmt = $this->pdo->prepare($query); 
            $stmt->execute(['id' => $garmentId]);
        }

}

