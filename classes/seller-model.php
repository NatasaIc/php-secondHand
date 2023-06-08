<?php

require_once "db.php";

class SellerModel extends DB {
    protected $table = "sellers";

    public function getAllSellers() {
        $query = "SELECT * FROM $this->table ORDER BY first_name ASC ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addSeller(string $firstname, string $lastname, string $email) {
        $query = "INSERT INTO sellers (first_name, last_name, email) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$firstname, $lastname, $email]);
    }

    public function getSellerWithGarments(int $id) {
    $query = "SELECT sellers.id, sellers.first_name, sellers.last_name, sellers.email, garments.garment, garments.price, garments.date_added, garments.sold_status, garments.seller_id FROM sellers
    JOIN garments ON sellers.id = garments.seller_id 
    WHERE sellers.id = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$id]);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($result) {
        $seller = [
            "id" => $result[0]['id'],
            "first_name" => $result[0]['first_name'],
            "last_name" => $result[0]['last_name'],
            "email" => $result[0]['email'],
        ];

        foreach($result as $res) {
            $seller["garments"][] = [
                "garment" => $res['garment'],
                "price" => $res['price'],
                "date_added" => $res['date_added'],
                "sold_status" => $res['sold_status']
            ];
        }
            return $seller;
        }
        return null;
    }

    public function deleteSeller (int $id) : void {
        $query = "DELETE FROM sellers WHERE sellers.id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
    }

    public function updateSeller (string $firstname, string $lastname, string $email, int $id) {
        $query = "UPDATE {$this->table} SET first_name = ?, last_name = ?, email = ? WHERE id = ?;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$fistname, $lastname, $email, $id]);  
    }

}

