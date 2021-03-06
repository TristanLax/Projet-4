<?php 


class LoginController
{
    
    /* Methode vérifiant si une session a été ouverte, si c'est le cas redirige automatiquement en partie administration, gère aussi le message d'erreur en cas de mauvais email/mot de passe. Et si aucune de ces conditions n'est appliquée, affiche tout simplement l'accueil. */
    
    public function loginaccueilAction() 
    {
        if (isset($_SESSION['user']))  {   
            header("location: index.php?controller=chapitre&action=Adminindex");
        }
        else { 
            $error = '';
            if (isset($_GET['error'])) {
                $error = 'Mauvais login ou mot de passe';
            }
            require(dirname(__FILE__).'/../view/login.php');
        }
    }
    
    /* Methode récupérant l'email et le password tapé par l'utilisateur avant de les transmettre a l'userManager puis a l'User pour vérifier si l'adresse existe en DB, puis vérifier si le mot de passe. Si une erreur est detectée, affichera une erreur. Si l'email et le mot de passe sont valides, redirigera sur la partie admin. */
    
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
        $_SESSION['user'] = $user;
        header("location: index.php?controller=chapitre&action=Adminindex");
    }
    
}
