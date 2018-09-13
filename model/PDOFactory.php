<?php

namespace Tanamassar\Projet_4\Model;

class PDOFactory
{
  public static function dbConnect()
  {
        $db = new \PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      
        return $db;
  }
}