<?php

Autoloader::register();

class ArticleManager extends Manager
{
    
    public function getArticle($postId)
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(article_date, \'%d/%m/%Y\') AS article_date, DATE_FORMAT(article_edit, \'%d/%m/%Y\') AS article_edit, sort FROM articles WHERE id = ?';
        $article = $this->fetch($sql, 'Article', [$postId]);

        return $article;
    }
    
    public function getArticles()
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(article_date, \'%d/%m/%Y\') AS article_date, DATE_FORMAT(article_edit, \'%d/%m/%Y\') AS article_edit, sort FROM articles ORDER BY sort';
        $articles = $this->fetchAll($sql, 'Article');

        return $articles;
    }
    
    public function maxSort()
    {
        $sql ='SELECT MAX(sort)+1 AS maxSort FROM articles';
        $sort = $this->query($sql);
        
        return $sort['maxSort'];
    }

    public function postArticle($title, $content)
    {
        $sort = $this->maxSort();
        $sql = 'INSERT INTO articles(title, content, article_date, sort) VALUES(?, ?, NOW(), ?)';
        $addArticle = $this->upsert($sql, [$title, $content, $sort]);
        
        return $addArticle;
    }
    
    public function editArticle($id, $title, $content, $sort)
    {
        $edit = $this->db->prepare('UPDATE articles SET title = :title, content = :content, article_edit = NOW(), sort = :sort WHERE id = :id');
        $edit->bindValue(':title', $title);
        $edit->bindValue(':content', $content);
        $edit->bindValue(':id', $id);
        $edit->bindValue(':sort', $sort);

        $edit->execute();
    }
    
    public function deleteArticle($id, $sort)
    {
        $req = $this->db->exec('DELETE FROM articles WHERE id = '.$id);
        $req = $this->db->exec('DELETE FROM comments WHERE article_id = '.$id);
        $sql = 'UPDATE articles SET sort = sort -1 WHERE sort >'.$sort;
        $correctSort = $this->upsert($sql, [$sort]);
        
        return $correctSort;
    }
    
}
