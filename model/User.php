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
    
    /* protected function fromArray(array $params)
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

    protected function fromArray(array $params)
    {
        foreach ($params as $name => $value) {
            $setter = 'set' . ucfirst($name);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
        return $this;
    } 
    */
    
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