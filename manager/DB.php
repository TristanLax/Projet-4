<?php

    class DB 
    {
        
    private $connection;
    private static $_instance;
        
        
    private function __construct() 
    {
        $this->connection = new \PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
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