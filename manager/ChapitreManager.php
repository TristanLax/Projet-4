<?php


class ChapitreManager extends Manager
{
    
    
    /* Fonction comptant le nombre de chapitres présents dans la DB pour permettre la pagination. */
    
    public function countChapitres()
    {
        
        $req = $this->db->prepare('SELECT COUNT(id) as nbChap FROM chapitres');
        $req->execute();
        
        $results = $req->fetch(PDO::FETCH_ASSOC);
        
        return $results['nbChap'];
    }
    
    /* Methode effectuant une simple query pour ajuster le sort d'un nouveau chapitre en fonction de ceux précédents, permettant de garder automatiquement une cohérence dans la liste. */
    
    public function maxSort()
    {
        $req = $this->db->prepare('SELECT MAX(sort) AS maxSort FROM chapitres');
        $req->execute();
        
        $sort = $req->fetch(PDO::FETCH_ASSOC);
        
        return $sort['maxSort'];
    }
    
    /* Methode permettant de récupèrer un chapitre unique en acceptant en paramètre son sort avant de faire une requête SQL pour le récupèrer en DB puis de le retourner en un objet. */
    
    public function getChapitre($chapitre_sort)
    {
        $sort = $this->maxSort();
            
        if (is_numeric($chapitre_sort) AND $chapitre_sort > 0 AND $chapitre_sort <= $sort) {
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(add_date, \'%d/%m/%Y\') AS add_date, DATE_FORMAT(edit_date, \'%d/%m/%Y\') AS edit_date, sort FROM chapitres WHERE sort = :sort ');
        $req->execute(array('sort' => $chapitre_sort));

        $result = $req->fetch(PDO::FETCH_ASSOC);
        return new Chapitre($result);
        }
        else {
            header('Location: erreur.php');
        }
    }
    
    /* Methode récupérant l'intégralité des chapitres présents en DB avant de les retourner sous forme d'objets. Récupère aussi les paramètres liés à la pagination pour permettre cette dernière. */
    
    public function getChapitres($page, $perPage)
    {
        $maxPage = ceil($this->countChapitres()/$perPage);
        
        if (is_numeric($page) AND $page > 0 AND $page <= $maxPage) {
        $req = $this->db->prepare("SELECT id, title, content, DATE_FORMAT(add_date, \"%d/%m/%Y\") AS add_date, DATE_FORMAT(edit_date, \"%d/%m/%Y\") AS edit_date, sort FROM chapitres ORDER BY sort LIMIT ".(($page-1)*$perPage).",$perPage");
        $req->execute();
        
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
            foreach($results as $result)
            {
                $chapitre = new Chapitre($result);
                $chapitres[] = $chapitre;
            } 
            return $chapitres;
        }
        else {
            header('Location: erreur.php');
        }
    }
    
    
    /* Methode servant dans la partie modération des commentaires permettant de récupèrer la liste de tous les chapitres triés directement par sort pour pouvoir ensuite les afficher. */
    
    public function getAllChapitres()
    {
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(add_date, \'%d/%m/%Y\') AS add_date, DATE_FORMAT(edit_date, \'%d/%m/%Y\') AS edit_date, sort FROM chapitres ORDER BY sort');
        $req->execute();
        
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $result)
        {
            $chapitre = new Chapitre($result);
            $chapitres[] = $chapitre;
        } 
        
        return $chapitres;
    }
    
    /* Récupère le titre et le contenu de TinyMCE avant d'attribuer automatiquement le sort graçe à la methode maxSort, puis envoie le tout en DB pour stockage et sauvegarde. */

    public function postChapitre($title, $content)
    {
        $sort = $this->maxSort()+1;
        $req = $this->db->prepare('INSERT INTO chapitres SET title = :title, content = :content, add_date = NOW(), sort = :sort');
        $req->execute(array('title' => $title, 'content' => $content, 'sort' => $sort));
    }
    
    /* Methode qui accepte en paramètre les contenu, titre, id et le sort avant de les envoyer a la DB pour éditer les données et les mettre à jour. */
    
    public function editChapitre($id, $title, $content, $currentSort, $sort)
    {
        $req = $this->db->prepare('UPDATE chapitres SET sort = :currentSort WHERE sort = :sort');
        $req->execute(array('currentSort' => $currentSort, 'sort' => $sort));
        
        $edit = $this->db->prepare('UPDATE chapitres SET title = :title, content = :content, edit_date = NOW(), sort = :sort WHERE id = :id');
        $edit->execute(array('title' => $title, 'content' => $content, 'id' => $id, 'sort'=> $sort));
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
