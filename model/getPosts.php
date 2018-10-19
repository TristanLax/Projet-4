<?php

namespace Projet_4\Model;

require_once("model/PDOFactory.php");

class getPosts extends PDOFactory
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(article_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(article_edit, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_date_fr FROM articles ORDER BY article_date DESC LIMIT 0, 5');

        return $req;
    }
    
}