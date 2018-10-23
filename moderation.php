<?php
require('Controller/AdminController.php');

try {
    reportedComments();
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
