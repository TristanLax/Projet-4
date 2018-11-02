<?php

class PDOFactory
    
{
  protected function dbConnect()
  {
        $db = new \PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      
        return $db;
  }
    
    public function db()
    {
        return $this->dbConnect();
    }
}