<?php

namespace Projet_4\Model;

require_once("model/PDOFactory.php");

class postArticle extends PDOFactory
{
    public function postArticle($title, $content)
    {
        $db = $this->dbConnect();
        $article = $db->prepare('INSERT INTO articles(title, content, article_date) VALUES(?, ?, NOW())');
        $affectedLines = $article->execute(array($title, $content));

        return $affectedLines;
    }
}