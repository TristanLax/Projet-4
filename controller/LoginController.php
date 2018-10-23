<?php 

require('\Autoloader.php');
Projet_4\Autoloader::register();


class LoginController {
    
    public function connexionTest() {
        
        if (isset($_SESSION['secured'])) 
        {   
        header("location: admin.php");
        }
    }
    
    public function blog() {
        
        if (isset($_GET['action']))
        {
            $this->action = $_GET['action'];
            $this->action();
        }
    }
    
    public function action() {
        
        if ($this->action == 'loginAction') {
            $this->loginAction();
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
        echo 'Erreur';
        return;
    }
    if (!$user->checkPassword($password)) {
        echo 'Erreur';
        return;
    }
        session_start();
        $_SESSION['secured'] = "secured";
    }
    
    
    
/*
if (isset($_POST['connexion']))
{
    $getSession = new \Projet_4\Model\Session();
    $getUser = new \Projet_4\Model\User();
    $userManager = new \Projet_4\Manager\UserManager();

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
*/
    
    
}
