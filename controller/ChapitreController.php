<?php


class ChapitreController extends AdminController
{

    /* Fonctionne de la même façon que l'action accueil de la partie utilisateur. Inclut la pagination pour améliorer la visibilité. */
    
    public function adminindexAction()
    {
        $page = $_GET['page'] ?? 1;
        $chapitreManager = new ChapitreManager();
        
        $nbChapitres = $chapitreManager->countChapitres();
        $perPage = 6;
        $totalPage = ceil($nbChapitres/$perPage);
        
        $chapitres = $chapitreManager->getChapitres($page, $perPage);
        
        require(dirname(__FILE__).'/../view/admin.php');
    }
    
    /* Fonctionne de la même façon que l'action getChapitre de la partie utilisateur, ne récupérant juste pas les commentaires et utilisant l'ID plutôt que le sort. Sa seule réelle modification étant le $formaction. */
    
    public function getchapitreAction()
    {
        $formAction = 'index.php?controller=chapitre&action=modifier';
        
        $ChapitreManager = new ChapitreManager();
        $chapitre = $ChapitreManager->getChapitre($_GET['sort']);  
        
        require(dirname(__FILE__).'/../view/adminChapitre.php');
    }
    
    /* Cette methode sert tout simplement à modifier l'action du formulaire pour lui permettre d'envoyer un nouveau chapitre en DB au lieu de l'éditer quand on choisir d'écrire un nouveau chapitre.  */
    
    public function ecrirechapitreAction()
    {
        $formAction = 'index.php?controller=chapitre&action=envoyer';
        
        require(dirname(__FILE__).'/../view/adminChapitre.php');
    }
    
    /*  Methode vérifiant les informations puis poste les données pour enregistrement en DB et création d'un nouveau chapitre. */
    
    public function envoyerAction() 
    {
        $ChapitreManager = new ChapitreManager();
        $ChapitreManager->postChapitre($_POST["title"], $_POST["content"]);
        
        header('location: index.php?controller=chapitre&action=adminindex');
    }
    
    /* Envoie au Manager l'ID, le titre, le contenu et l'ancien puis le nouveau sort pour lui permettre de mettre a jour l'article édité, puis affiche la page mise à jour. */
    
    public function modifierAction() 
    {
        $ChapitreManager = new ChapitreManager();
        $ChapitreManager->editChapitre($_POST['id'], $_POST['title'], $_POST['content'], $_POST['currentSort'], $_POST['sort']);
        
        header('location: index.php?controller=chapitre&action=getchapitre&sort='.$_POST['sort']);
    }

    /* Envoie au Manager l'ID du chapitre et son sort pour permettre leur traitement et la suppression de l'article. */
    
    public function supprimerAction() 
    {
        $ChapitreManager = new ChapitreManager();
        $ChapitreManager->deleteChapitre($_GET['id'], $_GET['sort']);
    }
}

