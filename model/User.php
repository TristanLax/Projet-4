<?php

namespace Projet_4\Model;


class User
{
    
    private $id;
    private $email;
    private $password;
    
    public function __construct(array $params=[])
    {
        $this->fromArray($params);
    }
    
    protected function fromArray(array $params)
    {
        if (isset($params['id'])) {
            $this->setId($params['id']);
        }
        if (isset($params['email'])) {
            $this->setEmail($params['email']);
        }
        if (isset($params['password'])) {
            $this->setPassword($params['password']);
        }
    }
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getId() 
    {
        return $this->id;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    
    public function getEmail() 
    {
        return $this->email;
    }
        
    
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
        
    public function getPassword() 
    {
        return $this->password;
    }
        
        
    public function checkPassword($password)
    {
        return password_verify($password, $this->getPassword());
        
    }
    
   /* public function login ($email, $password) 
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
  
    } */
    
}