<?php 

Autoloader::register();


class LoginController extends Controller {
    
    public function __construct() 
    {
        
    }
    
    public function LoginaccueilAction() 
    {
        if (isset($_SESSION['secured'])) 
        {   
            header("location: index.php?controller=admin&action=Adminaccueil");
        }
        else { 
            require('view/loginView.php');
        }
    }
    
    public function loginAction() {
    $getUser = new User();
    $userManager = new UserManager();

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
        header("location: index.php?controller=admin&action=Adminaccueil");
    }
    
    
}
