<?php
require_once './../../controllers/FarmerController.php';

if (isset($_GET['FarmerID'])) {
    $controller = new FarmerController();

    $controller->deleteFarmer($_GET['FarmerID']);

} else {
    echo "No ID provided";
}
?>
