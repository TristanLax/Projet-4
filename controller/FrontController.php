<?php


class FrontController
{ 
    
    /* Methode "de base" du site, récupérant grace au chapitreManager la liste de tous les chapitres présents en DB pour les afficher via la vue demandée. */
    
    public function AccueilAction() 
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

    /* Appelle puis envoie au CommentManager l'ID du chapitre que l'utilisateur souhaite signaler pour lui permettre de traiter la requête via reportComment. */
    
    public function signalerAction() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->reportComment($_GET['id']); 
    }


    /* Methode passant au manager l'ID du chapitre sur lequel le commentaire est écrit ainsi que le nom de l'auteur et le contenu du commentaire pour les faire traiter en DB via la methode postComment. */
    
    public function addcommentAction() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->postComment($_POST["chapitre_id"], $_POST["author"], $_POST["comment"]);

        header('Location: index.php?controller=front&action=getchapitre&id='. $_POST['chapitre_id']);
    }
    
}