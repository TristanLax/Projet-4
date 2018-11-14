<?php


class Manager {
    
    protected $db;
    
    public function __construct() 
    {
        
        $dbInstance = DB::getInstance();
        $this->db = $dbInstance->getConnection();
    }
    
    protected function fetch($sql, $class, $params = [])
    {
        $req = $this->db->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        $req->execute($params);
        $resultat = $req->fetch();
        
        if (!$resultat) {
            return null;
        } 

        return $resultat;
    }
    
    
    protected function fetchAll($sql, $class, $params = []) 
    {
        $req = $this->db->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        $req->execute($params);
        $resultat = $req->fetchAll();
        
        if (!$resultat) {
            return [];
        } 

        return $resultat;
    }
    
    protected function upsert($sql, $params = [])
    {
        $query = $this->db->prepare($sql);
        $result = $query->execute($params);
        
        return $result;
    }
    
}