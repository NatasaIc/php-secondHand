<?php

require_once "db.php";

class SellerModel extends DB {
    protected $table = "sellers";
    // Hämtar alla säljare
    public function getAllSellers() {
        $sql = "SELECT * FROM $this->table ORDER BY first_name ASC ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Lägger till ny säljare
    public function addSeller(string $firstname, string $lastname, string $email) {
        $sql = "INSERT INTO sellers (first_name, last_name, email) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$firstname, $lastname, $email]);
    }
    // Hämtar säljare med plagg
    public function getSellerWithGarments(int $id) {
    $sql = "SELECT sellers.id, sellers.first_name, sellers.last_name, sellers.email, garments.garment, garments.price, garments.date_added, garments.sold_status, garments.sold_date, garments.seller_id FROM sellers
    JOIN garments ON sellers.id = garments.seller_id 
    WHERE sellers.id = ?";
    $stmt = $this->pdo->prepare($sql);
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
                "sold_status" => $res['sold_status'],
                "sold_date" => $res['sold_date']
            ];
        }
            return $seller;
        }
        return null;
    }
}

