<?php

Autoloader::register();

class CommentManager extends Manager
{
    
    public function getComments($postId)
    {
        $comments = $this->db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE article_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }
    
    public function postComment($postId, $author, $comment)
    {
        $comments = $this->db->prepare('INSERT INTO comments(article_id, author, comment, reports, comment_date) VALUES(?, ?, ?, 0, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
    
    public function reportComment($id) 
    {
        $report =  $this->db->exec('UPDATE comments SET reports = reports +1 WHERE id ='.(int) $id);
    }
    
    public function getReports()
    {
        $req = $this->db->query('SELECT id, author, comment, reports FROM comments WHERE reports >= 0 ORDER BY reports DESC');
        return $req;
    }
    
    public function ignoreReport($id)
    {
        $ignore = $this->db->exec('UPDATE comments SET reports = 0 WHERE id = '.(int) $id);
    }
    
    public function moderateComment($id)
    {
        $moderate = $this->db->exec('UPDATE comments SET comment = "Commentaire modéré par l\'administration" WHERE id = '.(int) $id);
    }


  

}