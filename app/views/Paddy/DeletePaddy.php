<?php
require_once './../../controllers/PaddyController.php';

if (isset($_GET['PaddyID'])) {
    $controller = new PaddyController();

    $controller->deletePaddyType($_GET['PaddyID']);

} else {
    echo "No ID provided";
}
?>
