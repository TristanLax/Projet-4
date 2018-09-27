<?php

namespace Tanamassar\Projet_4\Model;

require_once("model/PDOFactory.php");

class ignoreReport extends PDOFactory
{


    public function ignoreReport($id)
    {
        $db = $this->dbConnect();
        $ignore = $db->exec('UPDATE comments SET reports = 0 WHERE id = '.(int) $id);
    }
}