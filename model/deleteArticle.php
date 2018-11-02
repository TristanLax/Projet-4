<?php

require_once("model/PDOFactory.php");

class deleteArticle extends PDOFactory
{


    public function deleteArticle($id)
    {
        $db = $this->dbConnect();
        $req = $db->exec('DELETE FROM articles WHERE id = '.(int) $id);
    }
    
}