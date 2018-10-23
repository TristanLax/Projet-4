<?php
require('controller/AdminController.php');

$controller = new AdminController();
$controller->blog();

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $controller->listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller->post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
