<?php

Autoloader::register();

class UserManager extends Manager
{
    public function getUser($email)
    {
        $req = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute(array('email' => $email));
        $resultat = $req->fetch();
        if (!$resultat) {
            return null;
        } 
        return new User($resultat);
        
        
    }

  

}