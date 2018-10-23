<?php
require('controller/AdminController.php');

$controller = new AdminController();
$controller->blog();

try {
    $controller->listPosts(); 
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
