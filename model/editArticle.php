<?php

namespace Tanamassar\Projet_4\Model;

require_once("model/PDOFactory.php");

class editArticle extends PDOFactory
{

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