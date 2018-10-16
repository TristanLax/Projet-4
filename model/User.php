<?php

namespace Tanamassar\Projet_4\Model;

require_once("model/PDOFactory.php");

class User extends PDOFactory
{
    
    public function login ($email, $password) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, password FROM users WHERE email = :email');
        $req->execute(array('email' => $email));
        
        $resultat = $req->fetch();
        $passwordVerify = password_verify($_POST['password'], $resultat['password']);
        if (!$resultat)
{
            echo 'Mauvais identifiant ou mot de passe !';
}

        else
        {
            if ($passwordVerify)
            {
                session_start();
                $_SESSION['user_id'] = $resultat['id'];
                $_SESSION['secured'] = "secured";
            }

                else 
                {
                    echo 'Mauvais identifiant ou mot de passe !';
                }

        }
  
    }
    
}