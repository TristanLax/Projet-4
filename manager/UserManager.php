<?php


class UserManager extends Manager
{
    
    public function getUser($email)
    {
        $user = $this->fetch('SELECT * FROM users WHERE email = :email', 'User', array('email' => $email));

        return $user;  
    }
    
}