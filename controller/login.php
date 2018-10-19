<?php 

require('\Autoloader.php');
Projet_4\Autoloader::register();


$getSession = new \Projet_4\Model\Session();
$getUser = new \Projet_4\Model\User();
$userManager = new Projet_4\Manager\UserManager();

if (isset($_POST['connexion']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $userManager->getUser($email);
    if (!$user) {
        echo 'Erreur';
        return;
    }
    if (!$user->checkPassword($password)) {
        echo 'Erreur';
        return;
    }
    // Ajouter redirection ouverture de session //
    print_r($user);
    exit;
}
