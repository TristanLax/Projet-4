<?php


class ChapitreManager extends Manager
{
    
    /* Methode permettant de récupèrer un chapitre unique en acceptant en paramètre son ID avant de faire une requête SQL pour le récupèrer en DB puis de le retourner en un objet. */
    
    public function getChapitre($chapitre_sort)
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(add_date, \'%d/%m/%Y\') AS add_date, DATE_FORMAT(edit_date, \'%d/%m/%Y\') AS edit_date, sort FROM chapitres WHERE sort = ?';
        $chapitre = $this->fetch($sql, 'Chapitre', [$chapitre_sort]);

        return $chapitre;
    }
    
    public function getAdminChapitre($chapitre_id)
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(add_date, \'%d/%m/%Y\') AS add_date, DATE_FORMAT(edit_date, \'%d/%m/%Y\') AS edit_date, sort FROM chapitres WHERE id = ?';
        $chapitre = $this->fetch($sql, 'Chapitre', [$chapitre_id]);

        return $chapitre;
    }
    
    /* Methode récupérant l'intégralité des chapitres présents en DB avant de les retourner sous forme d'objets. */
    
    public function getChapitres()
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(add_date, \'%d/%m/%Y\') AS add_date, DATE_FORMAT(edit_date, \'%d/%m/%Y\') AS edit_date, sort FROM chapitres ORDER BY sort';
        $chapitres = $this->fetchAll($sql, 'Chapitre');

        return $chapitres;
    }
    
    /* Methode effectuant une simple query pour ajuster le sort d'un nouveau chapitre en fonction de ceux précédents, permettant de garder automatiquement une cohérence dans la liste. */
    
    public function maxSort()
    {
        $sql ='SELECT MAX(sort) AS maxSort FROM chapitres';
        $sort = $this->query($sql);
        
        return $sort['maxSort'];
    }
    
    /* Récupère le titre et le contenu de TinyMCE avant d'attribuer automatiquement le sort graçe à la methode maxSort, puis envoie le tout en DB pour stockage et sauvegarde. */

    public function postChapitre($title, $content)
    {
        $sort = $this->maxSort()+1;
        $sql = 'INSERT INTO chapitres(title, content, add_date, sort) VALUES(?, ?, NOW(), ?)';
        $addChapitre = $this->upsert($sql, [$title, $content, $sort]);
        
        return $addChapitre;
    }
    
    /* Methode qui accepte en paramètre les contenu, titre, id et le sort avant de les bindValue pour pouvoir les envoyer a la DB pour éditer les données et les mettre à jour. */
    
    public function editChapitre($id, $title, $content, $currentSort, $sort)
    {
        $sql = 'UPDATE chapitres SET sort = :currentSort WHERE sort = :sort';
        $params = ['currentSort' => $currentSort, 'sort' => $sort];
        $editSort = $this->upsert($sql, $params);
        
        $edit = $this->db->prepare('UPDATE chapitres SET title = :title, content = :content, edit_date = NOW(), sort = :sort WHERE id = :id');
        $edit->bindValue(':title', $title);
        $edit->bindValue(':content', $content);
        $edit->bindValue(':id', $id);
        $edit->bindValue(':sort', $sort);

        $edit->execute();
    }
    
    /* Methode récupérant l'ID et le sort du chapitre sélectionné avant de le supprimer de la BD, réduisant ensuite le sort de tous les chapitres ayant un sort supérieur pour garder automatiquement une cohérence dans la liste. */
    
    public function deleteChapitre($id, $sort)
    {
        $req = $this->db->exec('DELETE FROM chapitres WHERE id = '.$id);
        $req = $this->db->exec('DELETE FROM comments WHERE chapitre_id = '.$id);
        $sql = 'UPDATE chapitres SET sort = sort -1 WHERE sort > :sort';
        $correctSort = $this->upsert($sql, ['sort' => $sort]);
        
        return $correctSort;
    }
    
}
