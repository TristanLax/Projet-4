<?php


class Manager {
    
    protected $db;
    
    public function __construct() {
        
        $dbInstance = DB::getInstance();
        $this->db = $dbInstance->getConnection();
    }
    
    
}