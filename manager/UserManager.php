<?php

namespace Projet_4\Manager;

require_once("PDOFactory.php");

use Projet_4\model\User;

class UserManager extends PDOFactory
{

    public function getUser($email)
    {
        $req = $this->db()->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute(array('email' => $email));
        $resultat = $req->fetch();
        if (!$resultat) {
            return null;
        } 
        return new User($resultat);
        
        
    }

  

}