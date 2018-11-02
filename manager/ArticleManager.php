<?php

Autoloader::register();

class ArticleManager extends Manager
{
    public function getArticle($postId)
    {
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(article_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(article_edit, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_date_fr FROM articles WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    
    public function getArticles()
    {
        $req = $this->db->query('SELECT id, title, content, DATE_FORMAT(article_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(article_edit, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_date_fr FROM articles ORDER BY article_date DESC LIMIT 0, 5');

        return $req;
    }
    
    public function postArticle($title, $content)
    {
        $article = $this->db->prepare('INSERT INTO articles(title, content, article_date) VALUES(?, ?, NOW())');
        $affectedLines = $article->execute(array($title, $content));

        return $affectedLines;
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
        $req = $this->db->exec('DELETE FROM articles WHERE id = '.(int) $id);
    }

 
}
