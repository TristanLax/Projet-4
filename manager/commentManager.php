<?php

Autoloader::register();

class CommentManager extends Manager
{

    public function getComments($chapitre_id)
    {
        $sql = 'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comments WHERE chapitre_id = ? ORDER BY comment_date DESC';
        $comments = $this->fetchAll($sql, 'Comment', [$chapitre_id]);

        return $comments;
    }
    
    public function postComment($chapitre_id, $author, $comment)
    {
        $sql = 'INSERT INTO comments(chapitre_id, author, comment, reports, comment_date) VALUES(?, ?, ?, 0, NOW())';
        $addComment = $this->upsert($sql, [$chapitre_id, $author, $comment]);

        return $addComment;
    }
    
    public function reportComment($id) 
    {
        $sql = 'UPDATE comments SET reports = reports +1 WHERE id ='.$id;
        $reportComment = $this->upsert($sql, [$id]);
        
        return $reportComment;
    }
    
    public function getReports()
    {
        $sql = 'SELECT id, author, comment, reports FROM comments WHERE reports >= 0 ORDER BY reports DESC';
        $getReports = $this->fetchAll($sql, 'Comment');
            
        return $getReports;
    }
    
    public function ignoreReport($id)
    {
        $sql = 'UPDATE comments SET reports = 0 WHERE id = '.$id;
        $ignoreReport = $this->upsert($sql, [$id]);
        
        return $ignoreReport;
    }
    
    public function moderateComment($id)
    {
        $sql = 'UPDATE comments SET comment = "Commentaire modéré par l\'administration" WHERE id = '.$id;
        $moderateComment = $this->upsert($sql, [$id]);
        
        return $moderateComment;
    }
    
}