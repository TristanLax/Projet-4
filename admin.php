<?php
require('controller/AdminController.php');

$controller = new AdminController();
$controller->blog();
$controller->listPosts();