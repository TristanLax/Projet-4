<?php
require('controller/backend.php');

try {
    listPosts();
    
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
