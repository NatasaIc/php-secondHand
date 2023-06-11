<?php

require_once "db.php";

class GarmentModel extends DB {
    protected $table = "garments";

    public function getAllGarments() {
        return $this->getAll($this->table);
    }

    public function addGarment(string $garment, float $price, int $status, int $sellerId): void {
        $date = date('Y-m-d');
        $query = "INSERT INTO $this->table (`garment`, `price`, `date_added`, `sold_status`, `seller_id`) VALUES (?,?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$garment, $price, $date, $status, $sellerId]);
    }

     public function getCountGarments($sellerId) {
            $query = "SELECT COUNT(*) AS total FROM garments WHERE seller_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$sellerId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        public function getTotalCost($sellerId){
            $query = "SELECT SUM(price) AS totalCost FROM garments WHERE seller_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$sellerId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['totalCost'];
        }

        public function getSoldGarmentCount() {
            $query = "SELECT COUNT(*) AS count FROM garments WHERE sold_status IS NOT NULL";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $result['count'];

            return $count;
        }

        public function markAsSold($garmentId) {
            $query = "UPDATE garments SET sold_status = 1 WHERE id = :id";
            $stmt = $this->pdo->prepare($query); 
            $stmt->execute(['id' => $garmentId]);
        }

}

