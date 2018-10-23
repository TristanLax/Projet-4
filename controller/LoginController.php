<?php 

require_once('Controller.php');


class LoginController extends Controller {
    
    public function connexionTest() {
        
        if (isset($_SESSION['secured'])) 
        {   
        header("location: admin.php");
        }
    }
    
    
    public function loginAction() {
    $getSession = new \Projet_4\Model\Session();
    $getUser = new \Projet_4\Model\User();
    $userManager = new \Projet_4\Manager\UserManager();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $userManager->getUser($email);
    if (!$user) {
        echo 'Mauvais identifiant ou mot de passe !';
        return;
    }
    if (!$user->checkPassword($password)) {
        echo 'Mauvais identifiant ou mot de passe !';
        return;
    }
        session_start();
        $_SESSION['secured'] = "secured";
    }
    
    
}
