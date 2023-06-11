<?php

require_once "db.php";

class GarmentModel extends DB {
    protected $table = "garments";

    public function getAllGarments() {
        return $this->getAll($this->table);
    }

    public function addGarment(string $garment, float $price, int $status, int $sellerId): void {

        try {
        $date = date('Y-m-d');
        $query = "INSERT INTO $this->table (`garment`, `price`, `date_added`, `sold_status`, `seller_id`) VALUES (?,?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$garment, $price, $date, $status, $sellerId]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

     public function getCountGarments() {
            $query = "SELECT COUNT(*) AS total FROM garments WHERE seller_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        public function getGarmentsTotalCost(){
            $query = "SELECT SUM(price) AS total_cost FROM garments WHERE seller_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

}

