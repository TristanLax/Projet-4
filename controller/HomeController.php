<?php


class HomeController
{ 
    
    public function __construct()
    {
    }
    
    /* Methode "de base" du site, récupérant grace au chapitreManager la liste de tous les chapitres présents en DB pour les afficher via la vue demandée. Considère aussi l'index comme la page 1 et incluant une pagination pour rendre la navigation sur le site plus claire. */
    
    public function accueilAction() 
    {   
        $page = $_GET['page'] ?? 1;
        $chapitreManager = new ChapitreManager();
        
        $nbChapitres = $chapitreManager->countChapitres();
        $perPage = 6;
        $totalPage = ceil($nbChapitres/$perPage);

        $chapitres = $chapitreManager->getChapitres($page, $perPage);
        
        require('view/accueil.php');
    }
    
    /* Methode récupérant un chapitre unique graçe aux methodes des managers getChapitre/Comment en leur passant l'ID présente dans l'URL pour génèrer la vue présente dans le require. Contient aussi le système de pagination des commentaires pour éviter qu'un chapitre avec trop de commentaires soit interminable. */
    
    public function GetchapitreAction() 
    {
        $page = $_GET['chapitre'] ?? 1;
        $comPage = $_GET['comPage'] ?? 1;
        $ChapitreManager = new ChapitreManager();
        $CommentManager = new CommentManager();
        $chapitre = $ChapitreManager->getChapitre($page);
        
        $nbComments = $CommentManager->countComments($chapitre->getId());
        $perPage = 4;
        $totalPage = ceil($nbComments/$perPage);
        
        $maxPage = $ChapitreManager->maxSort();
        $comments = $CommentManager->getComments($chapitre->getId(), $comPage, $perPage);
        
        require('view/chapitre.php');
    }
    
    
    
}