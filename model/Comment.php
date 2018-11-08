<?php

Autoloader::register();

class Comment extends Modele 
{
    
    private $id;
    private $article_id;
    private $author;
    private $comment;
    private $reports;
    private $comment_date;
    
    
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
    
    public function setArticle_id($article_id)
    {
        $this->article_id = $article_id;
        return $this;
    }
    
    public function getArticle_id() 
    {
        return $this->article_id;
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