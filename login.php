<?php
require('view/frontend/loginView.php');
require('controller/LoginController.php');


$controller = new LoginController();
$controller->blog();
$controller->connexionTest();