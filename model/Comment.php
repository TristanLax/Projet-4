<?php

/* Objet commentaire contenant les attributs tirés de la BDD, ainsi que ses setters/getters. Hérite de Modèle contenant la methode d'hydratation commune. */

class Comment extends Modele 
{
    
    private $comment_id;
    private $chapitre_id;
    private $chapitre;
    private $author;
    private $comment;
    private $reports;
    private $comment_date;
    
    
    public function __construct(array $params=[])
    {
        $this->fromArray($params);
    }
    
    public function setComment_Id($comment_id)
    {
        $this->comment_id = $comment_id;
        return $this;
    }
    
    public function getComment_Id() 
    {
        return $this->comment_id;
    }
    
    public function setChapitre_id($chapitre_id)
    {
        $this->chapitre_id = $chapitre_id;
        return $this;
    }
    
    public function getChapitre_id() 
    {
        return $this->chapitre_id;
    }
    
    public function setChapitre($params)
    {
        $this->chapitre = new Chapitre($params);
        return $this;
    }
    
    public function getChapitre()
    {
        return $this->chapitre;
    }
    
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }
    
    public function getAuthor() 
    {
        return $this->author;
    }
    
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }
    
    public function getComment() 
    {
        return $this->comment;
    }
    
    public function setReports($reports)
    {
        $this->reports = $reports;
        return $this;
    }
    
    public function getReports() 
    {
        return $this->reports;
    }
    
    public function setComment_date($comment_date)
    {
        $this->comment_date = $comment_date;
        return $this;
    }
    
    public function getDate() 
    {
        return $this->comment_date;
    }
    
}