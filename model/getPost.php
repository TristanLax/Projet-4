<?php

namespace Tanamassar\Projet_4\Model;

require_once("model/PDOFactory.php");

class getPost extends PDOFactory
{

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(article_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(article_edit, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_date_fr FROM articles WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}