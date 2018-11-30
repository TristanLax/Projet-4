<?php

Autoloader::register();

class ChapitreManager extends Manager
{
    
    public function getChapitre($chapitre_id)
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(add_date, \'%d/%m/%Y\') AS add_date, DATE_FORMAT(edit_date, \'%d/%m/%Y\') AS edit_date, sort FROM chapitres WHERE id = ?';
        $chapitre = $this->fetch($sql, 'Chapitre', [$chapitre_id]);

        return $chapitre;
    }
    
    public function getChapitres()
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(add_date, \'%d/%m/%Y\') AS add_date, DATE_FORMAT(edit_date, \'%d/%m/%Y\') AS edit_date, sort FROM chapitres ORDER BY sort';
        $chapitres = $this->fetchAll($sql, 'Chapitre');

        return $chapitres;
    }
    
    public function maxSort()
    {
        $sql ='SELECT MAX(sort)+1 AS maxSort FROM chapitres';
        $sort = $this->query($sql);
        
        return $sort['maxSort'];
    }

    public function postChapitre($title, $content)
    {
        $sort = $this->maxSort();
        $sql = 'INSERT INTO chapitres(title, content, add_date, sort) VALUES(?, ?, NOW(), ?)';
        $addChapitre = $this->upsert($sql, [$title, $content, $sort]);
        
        return $addChapitre;
    }
    
    public function editChapitre($id, $title, $content, $sort)
    {
        $edit = $this->db->prepare('UPDATE chapitres SET title = :title, content = :content, edit_date = NOW(), sort = :sort WHERE id = :id');
        $edit->bindValue(':title', $title);
        $edit->bindValue(':content', $content);
        $edit->bindValue(':id', $id);
        $edit->bindValue(':sort', $sort);

        $edit->execute();
    }
    
    public function deleteChapitre($id, $sort)
    {
        $req = $this->db->exec('DELETE FROM chapitres WHERE id = '.$id);
        $req = $this->db->exec('DELETE FROM comments WHERE chapitre_id = '.$id);
        $sql = 'UPDATE chapitres SET sort = sort -1 WHERE sort >'.$sort;
        $correctSort = $this->upsert($sql, [$sort]);
        
        return $correctSort;
    }
    
}
