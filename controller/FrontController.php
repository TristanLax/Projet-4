<?php


class FrontController
{
    
    public function AccueilAction() 
    {
        $ChapitreManager = new ChapitreManager();
        $chapitres = $ChapitreManager->getChapitres();
        require('view/listeChapitres.php');
    }
    
    public function GetchapitreAction() 
    {
        $ChapitreManager = new ChapitreManager($_GET['id']);
        $CommentManager = new CommentManager($_GET['id']);

        $chapitre = $ChapitreManager->getChapitre($_GET['id']);
        $comments = $CommentManager->getComments($_GET['id']);
        
        require('view/chapitre.php');
    }

    public function signalerAction() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->reportComment($_GET['id']); 
    }


    public function addcommentAction() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->postComment($_POST["chapitre_id"], $_POST["author"], $_POST["comment"]);

        header('Location: index.php?controller=front&action=getchapitre&id='. $_POST['chapitre_id']);
    }
    
}