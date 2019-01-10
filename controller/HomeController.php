<?php


class HomeController
{ 
    
    /* Methode "de base" du site, récupérant grace au chapitreManager la liste de tous les chapitres présents en DB pour les afficher via la vue demandée. */
    
    public function accueilAction() 
    {
        $ChapitreManager = new ChapitreManager();
        $chapitres = $ChapitreManager->getChapitres();
        require('view/accueil.php');
    }
    
    /* Methode récupérant un chapitre unique graçe aux methodes des managers getChapitre/Comment en leur passant l'ID présente dans l'URL pour génèrer la vue présente dans le require. */
    
    public function GetchapitreAction() 
    {
        $page = $_GET['chapitre'] ?? 1;
        $ChapitreManager = new ChapitreManager();
        $CommentManager = new CommentManager();

        $maxPage = $ChapitreManager->maxSort();
        $chapitre = $ChapitreManager->getChapitre($page);
        $comments = $CommentManager->getComments($chapitre->getId());
        
        require('view/chapitre.php');
    }
    
    
    
}