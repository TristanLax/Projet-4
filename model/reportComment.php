<?php

namespace Projet_4\Model;

require_once("model/PDOFactory.php");

class reportComment extends PDOFactory 
{  

public function reportComment($id) 
    {
        $db = $this->dbConnect();
        $report = $db->exec('UPDATE comments SET reports = reports +1 WHERE id ='.(int) $id);
    }
    
}  