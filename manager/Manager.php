<?php

/* Classe commune a tous les managers, récupérant en constructeur la connection a la DB et contenant les multiples methodes protégées nécéssaires a l'appel ou a l'envoi de données à cette dernière. */

class Manager 
{
    
    protected $db;
    
    
    public function __construct() 
    {
        
        $dbInstance = DB::getInstance();
        $this->db = $dbInstance->getConnection();
    }
    
    protected function isValid($number)
    {
        $recup = $number;
        if(preg_match('#[0-9]#', $recup)) {
            $number = array('number' => $recup);
            return $number;
    }
    }
    
    /* Methode permettant de fetch une unique classe objet, utile par exemple lors la récupération d'un chapitre unique. Accepte en paramètres une requête SQL, le nom de la classe demandée et un tableau de paramètres, qui est vide nativement pour éviter les erreurs. */
    
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
    
    /* Methode permettant de fetch de multiples objets d'une même classe, utile lors de la récupération de tous les articles du site ou de tous les commentaires, fonctionne autrement de la même façon que la methode fetch */
    
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
    
    /* */
    protected function fetchAllWithDependencies($sql, $class, $params = []) 
    {
        $req = $this->db->prepare($sql);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute($params);
        $resultat = $req->fetchAll();
        
        if (!$resultat) {
            return [];
        } 

        return $resultat;
    }
    
    /* Methode permettant d'exécuter une requête SQL, utile quand il n'est pas nécéssaire de récupèrer un objet mais qu'il est demandé d'envoyer des données brutes au serveur. Accepte en paramètres la requête SQL demandée et un tableau de paramètres. */
    
    protected function upsert($sql, $params = [])
    {
        $query = $this->db->prepare($sql);
        $result = $query->execute($params);
        
        return $result;
    }
    
    /* Effectue tout simplement une query au serveur pour récupèrer une valeur précise du tableau et/ou pour la modifier. Accepte en paramètres la requête SQL souhaitée et un tableau de paramètres comme ses compères. */
    
    protected function query($sql, $params = [])
    {
        $req = $this->db->prepare($sql);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute($params);
        $resultat = $req->fetch();
        
        if (!$resultat) {
            return null;
        } 

        return $resultat;
    }
    
}