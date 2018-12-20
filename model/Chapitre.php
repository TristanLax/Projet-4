<?php
    
/* Objet chapitre contenant les attributs tirés de la BDD, ainsi que ses setters/getters. Hérite de Modèle contenant la methode d'hydratation commune. */

class Chapitre extends Modele 
{
    
    private $id;
    private $title;
    private $content;
    private $add_date;
    private $edit_date;
    private $sort;
    
    
    public function __construct(array $params=[])
    {
        $this->fromArray($params);
    }
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getId() 
    {
        return $this->id;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    
    public function getTitle() 
    {
        return $this->title;
    }
    
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
    
    public function getContent() 
    {
        return $this->content;
    }
    
    public function setAdd_date($add_date)
    {
        $this->add_date = $add_date;
        return $this;
    }
    
    public function getDate() 
    {
        return $this->add_date;
    }
    
    public function setEdit_date($edit_date)
    {
        $this->edit_date = $edit_date;
        return $this;
    }
    
    public function getEdit() 
    {
        return $this->edit_date;
    }
    
    public function setSort($sort)
    {
        $this->sort = $sort;
        return $this;
    }
    
    public function getsort() 
    {
        return $this->sort;
    }

}