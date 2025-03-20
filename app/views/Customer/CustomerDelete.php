<?php
require_once '../../controllers/BuyerController.php';

if (isset($_GET['BuyerID'])) {
    $controller = new BuyerController();
    $controller->deleteBuyer($_GET['BuyerID']);
} else {
    echo "Error: No BuyerID provided.";
}

?>
