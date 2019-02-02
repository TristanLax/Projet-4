<?php


class UserManager extends Manager
{
    
    /* Methode récupérant en paramètre l'email tapé dans le formulaire de login permettant de récupèrer l'utilisateur avec cet email avant de return un objet user . */
    
    public function getUser($email)
    {
        $req = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute(array(':email' => $email));

        $results = $req->fetch(PDO::FETCH_ASSOC);
        
        if (!$results) {
            return null;
        } 
            
        return new User($results);  
    }
}