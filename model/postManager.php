<?php

namespace Tanamassar\Projet_4\Model;

require_once("model/PDOFactory.php");

class PostManager extends PDOFactory
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(article_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(article_edit, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_date_fr FROM articles ORDER BY article_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(article_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(article_edit, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_date_fr FROM articles WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    
    public function ArticleNumber()
    {
        return $this->db->query('SELECT ID(*) FROM articles')->fetchColumn();
    }
    
    public function Delete($id)
    {
        $db = $this->dbConnect();
        $req = $db->exec('DELETE FROM articles WHERE id = '.(int) $id);
    }

    public function postArticle($title, $content)
    {
        $db = $this->dbConnect();
        $article = $db->prepare('INSERT INTO articles(title, content, article_date) VALUES(?, ?, NOW())');
        $affectedLines = $article->execute(array($title, $content));

        return $affectedLines;
    }
    
    public function editArticle($id, $title, $content)
    {
        $db = $this->dbConnect();
        $edit = $db->prepare('UPDATE articles SET title = :title, content = :content, article_edit = NOW() WHERE id = :id');
        $edit->bindValue(':title', $title);
        $edit->bindValue(':content', $content);
        $edit->bindValue(':id', $id);

        $edit->execute();
    }
    
    
}
