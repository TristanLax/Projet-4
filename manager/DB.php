<?php

/* Class DB servant a créer une connection à la base de donnée, utilise le template singleton pour éviter la redondance des appels ne nécéssitant qu'une seule instance. Crée la connection dans le constructeur puis les methodes permettant d'éviter la duplication et d'appeller la connection. */

class DB extends Config
{
     
    private $connection;
    private static $_instance;
    
    
    private function __construct() 
    {
        $host = Config::getParam('host');
        $name = Config::getParam('name');
        $user = Config::getParam('user');
        $pass = Config::getParam('pass');
        $this->connection = new PDO("mysql:host=$host;dbname=$name;charset=utf8",$user,$pass);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public static function getInstance()
    {
        if(!self::$_instance) {
                self::$_instance = new DB();
            }
            return self::$_instance;
    }   
    public function getConnection()
        {
            return $this->connection;
        }
    
}