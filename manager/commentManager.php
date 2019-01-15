<?php


class CommentManager extends Manager
{
    
    
    /* Fonction comptant le nombre de chapitres présents dans la DB pour permettre la pagination. */
    
    public function paginationComments()
    {
        $sql = "SELECT COUNT(comment_id) as nbComments FROM comments";
        $result = $this->query($sql);
        
        return $result;
    }
    
    /* Methode récupérant l'ID d'un chapitre pour aller chercher via requête SQL les commentaires liés à ce chapitre puis de les return. */
    
    public function getComments($chapitre_id, $comPage)
    {
        
        $req = $this->paginationComments();
        
        $nbComments = $req['nbComments'];
        $affichage = 2;
        $totalPage = ceil($nbComments/$affichage);
        
        $sql = "SELECT comment_id, author, comment, DATE_FORMAT(comment_date, \"%d/%m/%Y à %Hh%imin%ss\") AS comment_date FROM comments WHERE chapitre_id = ? ORDER BY comment_date DESC LIMIT ".(($comPage-1)*$affichage).",$affichage";
        $comments = $this->fetchAll($sql, 'Comment', [$chapitre_id]);
        
        return $comments;
    }
    
    /* Methode récupérant en paramètres l'ID du chapitre où le commentaire a été écrit, puis le nom de l'auteur et le commentaire avant de les envoyer par requête SQL en DB. */
    
    public function postComment($chapitre_id, $author, $comment)
    {
        $sql = 'INSERT INTO comments(chapitre_id, author, comment, reports, comment_date) VALUES(?, ?, ?, 0, NOW())';
        $addComment = $this->upsert($sql, [$chapitre_id, $author, $comment]);

        return $addComment;
    }
    
    /* Methode acceptant l'ID du commentaire que l'on souhaite signaler avant d'utiliser une requête SQL utilisant ladite ID pour notifier et stocker le report. */
    
    public function reportComment($id) 
    {
        $sql = 'UPDATE comments SET reports = reports +1 WHERE comment_id ='.$id;
        $reportComment = $this->upsert($sql, [$id]);
        
        return $reportComment;
    }
    
    /* Methode effectuant une requête SQL pour récupèrer la liste des commentaires par nombre decroissant de signalements avant de les fetch en un tableau d'objet. */
    
    public function getReports($chapitreId = null)
    {
        $reports = [];
        $params = ['reports' => 0];
        $and = '';
        if(null !== $chapitreId) {
            $params['chapitreId'] = $chapitreId;
            $and = 'AND chapitre_id = :chapitreId';
        }
        
        $sql = 'SELECT * FROM comments INNER JOIN chapitres ON comments.chapitre_id = chapitres.id WHERE reports >= :reports '.$and.' ORDER BY reports DESC, chapitre_id';
        $results = $this->fetchAllWithDependencies($sql, 'Comment', $params);
        foreach($results as $result)
        {
            $report = new Comment($result);
            $report->setChapitre($result);
            $reports[] = $report;
        } 

        return $reports;
    }
    
    /* Methode acceptant l'ID du commentaire dont on souhaite annuler les reports avant d'utiliser une requête SQL a partir de l'ID dudit commentaire. */
    
    public function ignoreReport($id)
    {
        $sql = 'UPDATE comments SET reports = 0 WHERE comment_id = '.$id;
        $ignoreReport = $this->upsert($sql, [$id]);
        
        return $ignoreReport;
    }
    
    /* Methode acceptant l'ID du commentaire avant d'effectuer une requête SQL pour en modèrer le contenu par une phrase automatisée et de le notifier en DB. */
    
    public function moderateComment($id)
    {
        $sql = 'UPDATE comments SET comment = "Commentaire modéré par l\'administration" WHERE comment_id = '.$id;
        $moderateComment = $this->upsert($sql, [$id]);
        
        return $moderateComment;
    }
    
}