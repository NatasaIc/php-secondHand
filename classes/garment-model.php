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

    public function getGarmentWithSeller(int $id){
        $query = "SELECT sellers.id, sellers.first_name, sellers.last_name, sellers.email, garments.garment, garments.price, garments.date_added, garments.sold_status, garments.seller_id FROM sellers
        JOIN garments ON sellers.id = garments.seller_id 
        WHERE sellers.id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addGarmentWithSeller(string $garment, string $price, int $date_added, $seller_id) {
        $query = "INSERT INTO {$this->table} (garment, price, date_added, seller_id) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$garment, $price, $date_added, $seller_id]);
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

