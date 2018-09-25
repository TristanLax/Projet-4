<?php

namespace Tanamassar\Projet_4\Model;

require_once("model/PDOFactory.php");

class CommentManager extends PDOFactory
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE article_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(article_id, author, comment, reports, comment_date) VALUES(?, ?, ?, 0, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
    
    public function reportComment($id) 
    {
        $db = $this->dbConnect();
        $report = $db->exec('UPDATE comments SET reports = reports +1 WHERE id ='.(int) $id);
    }
    
    public function getReports()
    {
        
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, author, comment, reports FROM comments WHERE reports >= 0 ORDER BY reports DESC');
        
        return $req;
    }
    
    public function ignoreReport($id)
    {
        $db = $this->dbConnect();
        $ignore = $db->exec('UPDATE comments SET reports = 0 WHERE id = '.(int) $id);
    }
    
    public function moderateComment($id)
    {
        $db = $this->dbConnect();
        $ignore = $db->exec('UPDATE comments SET comment = "Commentaire modéré par l\'administration" WHERE id = '.(int) $id);
    }
}