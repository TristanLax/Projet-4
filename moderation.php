<?php
require('controller/backend.php');

try {
    reportedComments();
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
