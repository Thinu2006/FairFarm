<?php
class FarmerSellingPaddy {
    private $conn; 
    private $table = 'FarmerSellingPaddyType';  

    public $ID;
    public $PaddyID;
    public $FarmerID;
    public $Quantity;
    public $Price;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Method to insert a new record into the FarmerSellingPaddyType table
    public function createSellingPaddyType(){
        $query = "INSERT INTO " . $this->table . " (PaddyID, FarmerID, Quantity, Price) VALUES (:PaddyID, :FarmerID, :Quantity, :Price)";

        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':PaddyID', $this->PaddyID);
        $stmt->bindParam(':FarmerID', $this->FarmerID);
        $stmt->bindParam(':Quantity', $this->Quantity);
        $stmt->bindParam(':Price', $this->Price);

        if ($stmt->execute()){
            return true;
        }
        return false;
    }
}
?>

