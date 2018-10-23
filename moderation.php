<?php
require('Controller/AdminController.php');

$controller = new AdminController();
$controller->blog();

try {
    $controller->reportedComments();
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
