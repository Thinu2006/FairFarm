<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '../../../config/database.php';
require_once __DIR__ . '../../models/PaddyModel.php';

class PaddyController {
    private $db;
    private $paddy;

    public function __construct(){
        $database = new Database();
        $this->db = $database->connect();
        $this->paddy = new Paddy($this->db);
    }

    // Create a new paddy type
    public function createPaddyType(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $image_cover_path = '';

            // Check if files are uploaded
            if (isset($_FILES['Image']) && $_FILES['Image']['error'] == 0) {
                $targetDir = '../../../uploads/';
                $fileName = uniqid() . '_' . basename($_FILES['Image']['name']);
                $targetFile = $targetDir . $fileName;

                if (move_uploaded_file($_FILES['Image']['tmp_name'], $targetFile)) {
                    $image_cover_path = $fileName; // Save the file name for the database
                } else {
                    echo "Failed to upload paddy image.";
                    return;
                }
            }

            // Assign form data to model properties
            $this->paddy->PaddyName = htmlspecialchars($_POST['PaddyName']);
            $this->paddy->MaxPrice = htmlspecialchars($_POST['MaxPrice']);
            $this->paddy->Image = $image_cover_path;

            if ($this->paddy->createPaddyType()) {
                header('Location: http://localhost/FairFarm/app/views/Admin/ListPaddy.php?status=success');
                exit;
            } else {
                echo "Failed to create paddy type.";
            }
        }
    }

    // Get all paddy types
    public function index() {
        return $this->paddy->getAllPaddyTypes();
    }

    // Fetch a single paddy type by ID
    public function getPaddyById($PaddyID) {
        $stmt = $this->db->prepare("SELECT * FROM paddytype WHERE PaddyID = ?");
        $stmt->execute([$PaddyID]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update paddy type
    public function updatePaddyType($PaddyID) {
        // Check if POST data is set
        if (isset($_POST['PaddyName'], $_POST['MaxPrice'])) {
            $name = $_POST['PaddyName'];
            $maxPrice = $_POST['MaxPrice'];
            $image = null;

            // Check if new image is uploaded
            if (isset($_FILES['Image']) && $_FILES['Image']['error'] == 0) {
                $target = '../../../uploads/' . basename($_FILES['Image']['name']);
                if (move_uploaded_file($_FILES['Image']['tmp_name'], $target)) {
                    $image = basename($_FILES['Image']['name']); // Store the new image name
                } else {
                    echo "Failed to upload image.";
                    return;
                }
            }

            // Prepare the query to update paddy details
            if ($image) {
                $stmt = $this->db->prepare("UPDATE paddytype SET PaddyName = ?, MaxPrice = ?, Image = ? WHERE PaddyID = ?");
                $stmt->execute([$name, $maxPrice, $image, $PaddyID]);
            } else {
                $stmt = $this->db->prepare("UPDATE paddytype SET PaddyName = ?, MaxPrice = ? WHERE PaddyID = ?");
                $stmt->execute([$name, $maxPrice, $PaddyID]);
            }

            // Redirect after updating
            header('Location: http://localhost/FairFarm/app/views/Admin/ListPaddy.php?status=success');
            exit;
        } else {
            echo "Form data missing.";
        }
    }
    
    // Delete an farmer
    public function deletePaddyType($PaddyID){
        $this->paddy->PaddyID = $PaddyID;
        if ($this->paddy->delete()){
            header('Location: http://localhost/FairFarm/app/views/Admin/ListPaddy.php?status=success');
            exit;
        } else {
            echo "Failed to delete paddy type.";
        }
    }

}
?>
