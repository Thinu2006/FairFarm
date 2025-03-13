<?php
session_start();
require_once __DIR__ . '../../../config/database.php';
require_once __DIR__ . '../../models/AdminModel.php';

class AdminController {
    private $db;
    private $admin;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->admin = new Admin($this->db);
    }

    public function authenticateAdmin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->admin->Username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->admin->fetchAdmin();

            if ($user && password_verify($password, $user['Password'])) {
                $_SESSION['Admin_ID'] = $user['AdminId'];
                header("Location: http://localhost/FairFarm/app/views/Admin/AdminDashboard.php");
                exit;
            } else {
                echo "<script>alert('Invalid username or password. Please try again.');</script>";
            }
        }
    }

    public function adminlogout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: http://localhost/FairFarm/app/views/Admin/AdminLogin.php");
        exit;
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'adminlogout') {
    $controller = new AdminController();
    $controller->adminlogout();
}
?>