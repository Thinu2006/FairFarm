<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/FarmerModel.php';
require __DIR__ . '/../../vendor/autoload.php'; // Include Composer autoload

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class FarmerController {
    private $db;
    private $farmer;
    private $secretKey = "your_secret_key"; // Replace with a strong secret key

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->farmer = new Farmer($this->db);
    }

    // Sanitize and validate input
    private function sanitizeInput($data, $filter = FILTER_SANITIZE_STRING) {
        return filter_var(trim($data), $filter);
    }

    private function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Strong password validation function
    private function validatePassword($password) {
        if (strlen($password) < 8) {
            return "Password must be at least 8 characters long.";
        }
        if (!preg_match("/[A-Z]/", $password)) {
            return "Password must contain at least one uppercase letter.";
        }
        if (!preg_match("/[0-9]/", $password)) {
            return "Password must contain at least one number.";
        }
        if (!preg_match("/[\W_]/", $password)) {
            return "Password must contain at least one special character.";
        }
        return true;  // Valid password
    }

    // Generate JWT token
    private function generateToken($farmerId, $fullname) {
        $payload = [
            "farmerId" => $farmerId, // Ensure farmerId is included
            "fullname" => $fullname,
            "iat" => time(), // Issued at
            "exp" => time() + (60 * 60) // Expire in 1 hour
        ];
        return JWT::encode($payload, $this->secretKey, 'HS256');
    }

    // Validate JWT token
    private function validateToken($token) {
        try {
            $decoded = JWT::decode($token, new Key($this->secretKey, 'HS256'));
            return $decoded;
        } catch (Exception $e) {
            return false;
        }
    }

    public function createFarmer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if all required keys exist in $_POST
            $requiredFields = ['fullname', 'nic', 'contactno', 'address', 'email', 'password'];
    
            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    die("Error: Missing or empty field - " . $field);
                }
            }
    
            // Sanitize inputs
            $fullname = $this->sanitizeInput($_POST['fullname']);
            $nic = $this->sanitizeInput($_POST['nic']);
            $contactno = $this->sanitizeInput($_POST['contactno']);
            $address = $this->sanitizeInput($_POST['address']);
            $email = $this->sanitizeInput($_POST['email']);
            $password = $this->sanitizeInput($_POST['password']);
    
            // Validate email format
            if (!$this->validateEmail($email)) {
                die("Error: Invalid email format");
            }
    
            // Validate password strength
            $passwordValidation = $this->validatePassword($password);
            if ($passwordValidation !== true) {
                die("Error: " . $passwordValidation);
            }
    
            // Hash password before saving
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
            // Assign to Farmer object
            $this->farmer->FullName = $fullname;
            $this->farmer->NIC = $nic;
            $this->farmer->ContactNo = $contactno;
            $this->farmer->Address = $address;
            $this->farmer->Email = $email;
            $this->farmer->Password = $hashedPassword;
    
            // Attempt to create farmer
            if ($this->farmer->createFarmer()) {
                // Redirect to signin page
                header("Location: http://localhost/FairFarm/App/views/Farmer/FarmerSignin.php");
                exit;
            } else {
                echo "<script>alert('Registration failed. Please try again.');</script>";
            }
        }
    }

    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize inputs
            $fullname = $this->sanitizeInput($_POST['fullname']);
            $email = $this->sanitizeInput($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $this->sanitizeInput($_POST['password']);

            // Validate email
            if (!$this->validateEmail($email)) {
                echo "<script>alert('Invalid email format.');</script>";
                return;
            }

            $this->farmer->Email = $email;
            $this->farmer->FullName = $fullname;

            $user = $this->farmer->fetchFarmer();

            if ($user && password_verify($password, $user['Password'])) {
                // Generate JWT token with FarmerID
                $token = $this->generateToken($user['FarmerID'], $user['FullName']); // Include FarmerID here

                // Set token in a cookie or local storage (for frontend)
                setcookie("auth_token", $token, time() + (60 * 60), "/"); // 1 hour expiry

                // Redirect to dashboard
                header("Location: http://localhost/FairFarm/App/views/Farmer/FarmerDashboard.php");
                exit;
            } else {
                echo "<script>alert('Invalid credentials. Please try again.');</script>";
            }
        }
    }

    public function farmerlogout() {
        // Clear the token cookie
        setcookie("auth_token", "", time() - 3600, "/");
        header('Location: http://localhost/FairFarm/App/views/Farmer/FarmerSignin.php');
        exit;
    }

    public function index() {
        return $this->farmer->getAllFarmers();
    }

    public function getFarmerCount() {
        return $this->farmer->countFarmers();
    }

    // Delete an farmer
    public function deleteFarmer($FarmerID){
        $this->farmer->FarmerID = $FarmerID;
        if ($this->farmer->delete()){
            header('Location: http://localhost/FairFarm/app/views/Admin/FarmersList.php?status=success');
            exit;
        } else {
            echo "Failed to delete farmer.";
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'farmerlogout') {
    $controller = new FarmerController();
    $controller->farmerlogout();
}
?>