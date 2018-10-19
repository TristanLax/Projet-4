<?php

namespace Projet_4\Model;

require_once("model/PDOFactory.php");

class getReports extends PDOFactory {

    public function getReports()
    {
        
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, author, comment, reports FROM comments WHERE reports >= 0 ORDER BY reports DESC');
        
        return $req;
    }
}