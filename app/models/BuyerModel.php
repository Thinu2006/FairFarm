<?php
class Buyer {
    private $conn; 
    private $table = 'buyer'; 
    public $BuyerID;
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
    public function createBuyer() {
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

     // Fetch the buyers based on both email and fullname
    public function fetchBuyer() {
       
        $query = "SELECT * FROM " . $this->table . " WHERE Email = :Email AND FullName = :FullName LIMIT 1";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':Email', $this->Email);
        $stmt->bindParam(':FullName', $this->FullName);
    
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    //Get the all buyers 
    public function getAllBuyers(){
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    } 
    //Get the count of all the buyers
    public function countBuyers() {
        $query = "SELECT COUNT(*) FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
?>
