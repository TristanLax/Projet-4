<?php

namespace Projet_4\Manager;

require_once("Manager/DB.php");

use Projet_4\model\User;


class UserManager
{
    public function getUser($email)
    {
        $db = DB::getInstance();
        $req = $db->getConnection()->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute(array('email' => $email));
        $resultat = $req->fetch();
        if (!$resultat) {
            return null;
        } 
        return new User($resultat);
        
        
    }

  

}