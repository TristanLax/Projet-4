<?php 

Autoloader::register();


class LoginController
{
    
    public function LoginaccueilAction() 
    {
        if (isset($_SESSION['secured']))  {   
            header("location: index.php?controller=admin&action=Adminaccueil");
        }
        else { 
            $error = '';
            if (isset($_GET['error'])) {
                $error = 'Mauvais login ou mot de passe';
            }
            require('view/login.php');
        }
    }
    
    public function loginAction() {
    $getUser = new User();
    $userManager = new UserManager();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $userManager->getUser($email);
        
    if (!$user) {
        header("location:index.php?controller=login&action=Loginaccueil&error=true");
        return;
    }
    if (!$user->checkPassword($password)) {
        header("location:index.php?controller=login&action=Loginaccueil&error=true");
        return;
    }
        session_start();
        $_SESSION['secured'] = "secured";
        header("location: index.php?controller=admin&action=Adminaccueil");
    }
    
}
