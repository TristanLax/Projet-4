<?php


class AdminController 
{
    
    /* Constructeur vérifiant si l'utilisateur est connecté grace à la session, et le renvoie a l'acceuil si il ne l'est pas. */
    
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            header("location: index.php");
        }
    }
    
    /* Methode assez simple permettant de simplement détruire la session pour se déconnecter avant de guider l'utilisateur sur l'accueil du site. */
    
    public function logoutAction()
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }
    
}

