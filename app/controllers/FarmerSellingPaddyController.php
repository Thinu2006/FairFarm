<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/FarmerSellingPaddyModel.php';
require_once __DIR__ . '/../models/PaddyModel.php';

class FarmerSellingPaddyController {
    private $db;
    private $sellingpaddy;
    private $paddy;

    public function __construct(){
        $database = new Database();
        $this->db = $database->connect();
        $this->sellingpaddy = new FarmerSellingPaddy($this->db);
        $this->paddy = new Paddy($this->db);
    }

    // Method to handle the form submission and insert data into the database
    public function CreateFarmerSellingPaddyType() {
        if (isset($_POST['FarmerID'], $_POST['PaddyTypeID'], $_POST['Quantity'], $_POST['PriceSelected'])) {
            // Assign form data to model properties
            $this->sellingpaddy->FarmerID = $_POST['FarmerID'];
            $this->sellingpaddy->PaddyID = $_POST['PaddyTypeID'];
            $this->sellingpaddy->Quantity = $_POST['Quantity'];
            $this->sellingpaddy->Price = $_POST['PriceSelected'];
    
            // Call the model to insert the data
            if ($this->sellingpaddy->createSellingPaddyType()) {
                header('Location: http://localhost/FairFarm/app/views/Farmer/FarmerPaddyListing.php?status=success');
                exit;
            } else {
                echo "Failed to insert data.";
            }
        } else {
            echo "Missing form data.";
        }
    }
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'CreateFarmerSellingPaddyType') {
    $controller = new FarmerSellingPaddyController();
    $controller->CreateFarmerSellingPaddyType();
}
?>