<?php
require('controller/LoginController.php');


$controller = new LoginController();
$controller->loginView();
$controller->blog();
$controller->connexionTest();