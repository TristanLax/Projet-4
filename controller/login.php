<?php 

// Chargement des classes
require_once('model/Session.php');
require_once('model/User.php');

$getSession = new \Tanamassar\Projet_4\Model\Session();
$getUser = new \Tanamassar\Projet_4\Model\User();

if (isset($_POST['connexion']))
{
    $getUser = new \Tanamassar\Projet_4\Model\User();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login = $getUser->login($email, $password);
}
