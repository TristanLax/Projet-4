<?php

namespace Tanamassar\Projet_4\Model;

require_once("model/PDOFactory.php");

class moderateComment extends PDOFactory
{
    public function moderateComment($id)
    {
        $db = $this->dbConnect();
        $ignore = $db->exec('UPDATE comments SET comment = "Commentaire modéré par l\'administration" WHERE id = '.(int) $id);
    }
}


