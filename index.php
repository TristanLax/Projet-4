<?php

ini_set('display_errors','On');
session_start();

/* Crée un session start global pour le site pour permettre l'accès aux parties admin si connecté, ainsi que la création de l'auto-loader pour le bon fonctionnement du site. */

require('Autoloader.php');
Autoloader::register();

/* Index utilisant les methodes de la classe Dispatcher pour gèrer les requêtes et les transferts clients en gérant de façon automatique les demandes a l'aide des methodes getController, getAction et checkAction, pour ensuite les traiter si elles sont valides. */

$dispatcher = new Dispatcher();
$controllerName = $dispatcher->getController($_GET);
$controller = new $controllerName();
$action = $dispatcher->getAction($_GET);
$dispatcher->checkAction($controller, $action);
$controller->$action();


