<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '../../../config/database.php';
require_once __DIR__ . '../../models/FarmerModel.php';
require_once __DIR__ . '../../../config/otpMail.php'; 

class FarmerController {
    private $db; 
    private $farmer; 

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
    

    // Generate a random 6-digit OTP
    private function generateOTP() {
        return mt_rand(100000, 999999);
    }

    public function FarmerVerifyOTP() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $otpEntered = $_POST['otp'];
    
            if ($otpEntered == $_SESSION['OTP']) {
                // OTP is correct, redirect to farmer dashboard
                unset($_SESSION['OTP']);  // Clear OTP after verification
                header("Location: http://localhost/FairFarm/App/views/Farmer/FarmerDashboard.php");
                exit;
            } else {
                echo "<script>alert('Invalid OTP. Please try again.');</script>";
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
    
            if ($user && 
                (($user['Email'] === $this->farmer->Email && $user['FullName'] === $this->farmer->FullName) || 
                ($user['FullName'] === $this->farmer->FullName && password_verify($password, $user['Password'])))) {
    
                session_regenerate_id(true);
                $_SESSION['FarmerId'] = $user['FarmerId'];
                $_SESSION['farmer_fullname'] = $user['fullname'];
    
                // Generate OTP and send to email
                $otp = $this->generateOTP();
                $_SESSION['OTP'] = $otp;
                $_SESSION['OTP_EMAIL'] = $email; // Store email for later comparison
                sendOTPEmail($email, $otp);  // Function to send OTP via email
                
                // Redirect to OTP verification page
                header("Location: http://localhost/FairFarm/App/views/Farmer/FarmerOtpVerification.php");
                exit;
            } else {
                echo "<script>alert('Invalid credentials. Please try again.');</script>";
            }
        }
    }

    public function farmerlogout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: http://localhost/FairFarm/FairFarm/app/views/Admin/login.php');
        exit;
    }

    public function index() {
        return $this->farmer->getAllFarmers();
    }

    public function getFarmerCount() {
        return $this->farmer->countFarmers();
    }
    // Delete an farmer
    public function delete($FarmerID){
        $this->farmer->FarmerID = $FarmerID;
        if ($this->farmer->delete()){
            header('Location: http://localhost/FairFarm/FairFarm/app/views/Admin/FarmersList.php?status=success');
            exit;
        } else {
            echo "Failed to delete album.";
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'farmerlogout') {
    $controller = new FarmerController();
    $controller->farmerlogout();
}
?>
