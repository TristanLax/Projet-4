<?php


class UserManager extends Manager
{
    
    /* Methode récupérant en paramètre l'email tapé dans le formulaire de login permettant de récupèrer l'utilisateur avec cet email avant de return un objet user . */
    
    public function getUser($email)
    {
        $user = $this->fetch('SELECT * FROM users WHERE email = :email', 'User', array('email' => $email));

        return $user;  
    }
    
}