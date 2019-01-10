<?php


class ChapitreController extends AdminController
{

    /* Fonctionne de la même façon que l'action accueil de la partie utilisateur. */
    
    public function adminListAction()
    {
        $ChapitreManager = new ChapitreManager();
        $chapitres = $ChapitreManager->getChapitres();
        require('view/admin.php');
    }
    
    /* Fonctionne de la même façon que l'action getChapitre de la partie utilisateur, ne récupérant juste pas les commentaires. */
    
    public function getchapitreAction()
    {
        $formAction = 'index.php?controller=chapitre&action=modifier';
        $ChapitreManager = new ChapitreManager();
        $chapitre = $ChapitreManager->getAdminChapitre($_GET['id']);  
        require('view/adminChapitre.php');
    }
    
    public function ecrirechapitreAction()
    {
        $formAction = 'index.php?controller=chapitre&action=envoyer';
        
        if ('POST' == $_SERVER['REQUEST_METHOD']) {  
            $ChapitreManager = new ChapitreManager();
            $chapitre = $ChapitreManager->postChapitre($_POST["title"], $_POST["content"]); 
        }
        require('view/adminChapitre.php');
    }
    
    /* Methode envoyant au Manager le contenu du form présent en partie admin pour écrire de nouveaux commentaires puis affiche la page mise à jour. */
    
    public function envoyerAction() 
    {
        $ChapitreManager = new ChapitreManager();
        $ChapitreManager->postChapitre($_POST["title"], $_POST["content"]);
        
        header('location: index.php?controller=chapitre&action=adminlist');
    }
    
    /* Envoie au Manager l'ID, le titre, le contenu et le sort pour lui permettre de mettre a jour l'article édité, puis affiche la page mise à jour. */
    
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

