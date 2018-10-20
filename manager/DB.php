<?php
namespace Projet_4\Manager;

    class DB {
        
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
        
        private function __clone(){}
      

        public function getConnection()
        {
        return $this->connection;
        }
    }