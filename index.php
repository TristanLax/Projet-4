<?php
session_start();

require('Autoloader.php');
Autoloader::register();


$dispatcher = new Dispatcher();
$controllerName = $dispatcher->getController($_GET);
$controller = new $controllerName();
$action = $dispatcher->getAction($_GET);
$dispatcher->checkAction($controller, $action);
$controller->$action();


