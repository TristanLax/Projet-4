<?php


class ChapitreController extends AdminController
{

    /* Fonctionne de la même façon que l'action accueil de la partie utilisateur. Inclut la pagination pour améliorer la visibilité. */
    
    public function adminListAction()
    {
        $page = $_GET['page'] ?? 1;
        $chapitreManager = new ChapitreManager();
        
        $nbChapitres = $chapitreManager->countChapitres();
        $perPage = 6;
        $totalPage = ceil($nbChapitres/$perPage);
        
        $chapitres = $chapitreManager->getChapitres($page, $perPage);
        
        require(dirname(__FILE__).'/../View/admin.php');
    }
    
    /* Fonctionne de la même façon que l'action getChapitre de la partie utilisateur, ne récupérant juste pas les commentaires et utilisant l'ID plutôt que le sort. */
    
    public function getchapitreAction()
    {
        $formAction = 'index.php?controller=chapitre&action=modifier';
        $ChapitreManager = new ChapitreManager();
        $chapitre = $ChapitreManager->getAdminChapitre($_GET['id']);  
        require(dirname(__FILE__).'/../View/adminChapitre.php');
    }
    
    /*  Methode vérifiant les informations puis poste les données pour enregistrement en DB et création d'un nouveau chapitre. */
    
    public function ecrirechapitreAction()
    {
        $formAction = 'index.php?controller=chapitre&action=envoyer';
        
        if ('POST' == $_SERVER['REQUEST_METHOD']) {  
            $ChapitreManager = new ChapitreManager();
            $chapitre = $ChapitreManager->postChapitre($_POST["title"], $_POST["content"]); 
        }
        require(dirname(__FILE__).'/../View/adminChapitre.php');
    }
    
    /* Envoie au Manager l'ID, le titre, le contenu et l'ancien puis le nouveau sort pour lui permettre de mettre a jour l'article édité, puis affiche la page mise à jour. */
    
    public function modifierAction() 
    {
        $ChapitreManager = new ChapitreManager();
        $ChapitreManager->editChapitre($_POST['id'], $_POST['title'], $_POST['content'], $_POST['currentSort'], $_POST['sort']);
        
        header('location: index.php?controller=chapitre&action=getchapitre&id='.$_POST['id']);
    }

    /* Envoie au Manager l'ID du chapitre et son sort pour permettre leur traitement et la suppression de l'article. */
    
    public function supprimerAction() 
    {
        $ChapitreManager = new ChapitreManager();
        $ChapitreManager->deleteChapitre($_GET['id'], $_GET['sort']);
    }
}

