<?php

Autoloader::register();

class ArticleManager extends Manager
{
    
    public function getArticle($postId)
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(article_date, \'%d/%m/%Y\') AS article_date, DATE_FORMAT(article_edit, \'%d/%m/%Y à %Hh%imin%ss\') FROM articles WHERE id = ?';
        $article = $this->fetch($sql, 'Article', [$postId]);

        return $article;
    }
    
    public function getArticles()
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(article_date, \'%d/%m/%Y\') AS article_date, DATE_FORMAT(article_edit, \'%d/%m/%Y à %Hh%imin%ss\') AS article_edit FROM articles ORDER BY article_date DESC';
        $articles = $this->fetchAll($sql, 'Article');

        return $articles;
    }

    public function postArticle($title, $content)
    {
        $sql = 'INSERT INTO articles(title, content, article_date) VALUES(?, ?, NOW())';
        $addArticle = $this->upsert($sql, [$title, $content]);
        
        return $addArticle;
    }
    
    public function editArticle($id, $title, $content)
    {
        $edit = $this->db->prepare('UPDATE articles SET title = :title, content = :content, article_edit = NOW() WHERE id = :id');
        $edit->bindValue(':title', $title);
        $edit->bindValue(':content', $content);
        $edit->bindValue(':id', $id);

        $edit->execute();
    }
    
    public function deleteArticle($id)
    {
        $req = $this->db->exec('DELETE FROM articles WHERE id = '.$id);
    }
    
}
