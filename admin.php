<?php
require('controller/AdminController.php');

try {
    listPosts(); 
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
