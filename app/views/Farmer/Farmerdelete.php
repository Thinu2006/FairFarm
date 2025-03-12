<?php
require_once '../../../App/controllers/FarmerController.php';

if (isset($_GET['FarmerID'])) {
    $controller = new FarmerController();

    $controller->delete($_GET['FarmerID']);

} else {
    echo "No ID provided";
}
?>
