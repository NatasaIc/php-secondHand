<?php

require_once "db.php";

class GarmentModel extends DB {
    protected $table = "garments";

    public function getAllGarments() {
        return $this->getAll($this->table);
    }

    public function getGarmentById(int $id) :array{
        $query = "SELECT * FROM $this->table WHERE $this->table.id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addGarment(string $garment, string $price, int $date, int $sellerId) {
        $query = "INSERT INTO {$this->table} (garment, price, date_added, seller_id) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$garment, $price, $date, $sellerId]);
    }

     public function getTotalGarments() {
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

