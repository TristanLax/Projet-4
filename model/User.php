<?php

require('Modele.php');

class User extends Modele 
{
    
    private $id;
    private $email;
    private $password;
    
    public function __construct(array $params=[])
    {
        $this->fromArray($params);
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
    
}