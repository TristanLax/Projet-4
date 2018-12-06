<?php


class AdminController 
{
    
    public function __construct()
    {
        if (!isset($_SESSION['secured'])) {
            header("location: index.php");
        }
    }
    
    public function adminaccueilAction()
    {
        $ChapitreManager = new ChapitreManager();
        $chapitres = $ChapitreManager->getChapitres();
        require('view/admin.php');
    }
    
    public function getchapitreAction()
    {
        $ChapitreManager = new ChapitreManager($_GET['id']);
        $chapitre = $ChapitreManager->getChapitre($_GET['id']);
        require('view/adminChapitre.php');
    }
    
    public function reportedcommentsAction()
    {
        $CommentManager = new CommentManager();
        $reportedComments = $CommentManager->getReports();
        require('view/moderation.php');
    }
    
    public function logoutAction()
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }
    
    public function modererAction() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->moderateComment($_GET['id']);
    }
    
    public function ignorerAction() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->ignoreReport($_GET['id']);
    }
    
    public function envoyerAction() 
    {
        $ChapitreManager = new ChapitreManager();
        $ChapitreManager->postChapitre($_POST["title"], $_POST["content"]);
        
        header('location: index.php?controller=admin&action=adminaccueil');
    }

    public function modifierAction() 
    {
        $ChapitreManager = new ChapitreManager();
        $ChapitreManager->editChapitre($_POST['id'], $_POST['title'], $_POST['content'],$_POST['sort']);
        
        header('location: index.php?controller=admin&action=getchapitre&id='.$_POST['id']);
    }

    public function supprimerAction() 
    {
        $ChapitreManager = new ChapitreManager();
        $ChapitreManager->deleteChapitre($_GET['id'], $_GET['sort']);
    }
    
}

