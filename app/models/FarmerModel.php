<?php
class Farmer {
    private $conn; 
    private $table = 'farmer'; 
    public $FarmerID;
    public $FullName;
    public $NIC;
    public $ContactNo;
    public $Address;
    public $Email;
    public $Password;

    public function __construct($db) {
        $this->conn = $db; 
    }

    //Create a customer
    public function createFarmer() {
        $query = "INSERT INTO " . $this->table . " (FullName, NIC, ContactNo, Address, Email,Password) VALUES (:FullName, :NIC, :ContactNo, :Address, :Email, :Password)";
        $stmt = $this->conn->prepare($query);
    
        // Use prepared statements to prevent SQL injection
        $stmt->bindParam(':FullName', $this->FullName, PDO::PARAM_STR);
        $stmt->bindParam(':NIC', $this->NIC, PDO::PARAM_STR);
        $stmt->bindParam(':ContactNo', $this->ContactNo, PDO::PARAM_STR);
        $stmt->bindParam(':Address', $this->Address, PDO::PARAM_STR);
        $stmt->bindParam(':Email', $this->Email, PDO::PARAM_STR);
        $stmt->bindParam(':Password', $this->Password, PDO::PARAM_STR);
    
        return $stmt->execute();
    }

     // Fetch the farmer based on both email and fullname
    public function fetchFarmer() {
        $query = "SELECT * FROM " . $this->table . " WHERE Email = :Email AND FullName = :FullName LIMIT 1";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':Email', $this->Email);
        $stmt->bindParam(':FullName', $this->FullName);
    
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    //Get the all farmers 
    public function getAllFarmers(){
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    //Get the count of all the farmers 
    public function countFarmers() {
        $query = "SELECT COUNT(*) FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    // Delete farmer from the database
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE FarmerID = :FarmerID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':FarmerID', $this->FarmerID, PDO::PARAM_INT);
    
        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());  // Print error details
            return false;
        }
        return true;
    }
}
?>