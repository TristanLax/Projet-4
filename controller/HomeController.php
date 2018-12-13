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
        $ChapitreManager = new ChapitreManager($_GET['id']);
        $CommentManager = new CommentManager($_GET['id']);

        $chapitre = $ChapitreManager->getChapitre($_GET['id']);
        $comments = $CommentManager->getComments($_GET['id']);
        
        require('view/chapitre.php');
    }
    
}