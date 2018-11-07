<?php

require('Modele.php');

class Article extends Modele 
{
    private $id;
    private $title;
    private $content;
    private $article_date;
    private $article_edit;
    
    
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
    
    public function setArticle_date($article_date)
    {
        $this->article_date = $article_date;
        return $this;
    }
    
    public function getDate() 
    {
        return $this->article_date;
    }
    
    public function setArticle_edit($article_edit)
    {
        $this->article_edit = $article_edit;
        return $this;
    }
    
    public function getEdit() 
    {
        return $this->article_edit;
    }
    
    
    
}