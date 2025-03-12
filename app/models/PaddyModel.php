<?php
class Paddy
{
    private $conn; 
    private $table = 'paddytype';  // Keep this as paddytype to match the database

    public $PaddyID;
    public $PaddyName;
    public $MaxPrice;
    public $Image;

    public function __construct($db) {
        $this->conn = $db; 
    }

    // Create a new paddy type in the database
    public function createPaddyType(){
        $query = "INSERT INTO " . $this->table . " (PaddyName, MaxPrice, Image) VALUES (:PaddyName, :MaxPrice, :Image)";
        
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':PaddyName', $this->PaddyName);
        $stmt->bindParam(':MaxPrice', $this->MaxPrice);
        $stmt->bindParam(':Image', $this->Image);

        if ($stmt->execute()){
            return true;
        }
        return false;
    }

    // Get all paddy types
    public function getAllPaddyTypes() {
        $query = "SELECT PaddyID, PaddyName, MaxPrice, Image FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Delete paddy from the database
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE PaddyID = :PaddyID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':PaddyID', $this->PaddyID, PDO::PARAM_INT);
    
        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());  // Print error details
            return false;
        }
        return true;
    }
}
?>
