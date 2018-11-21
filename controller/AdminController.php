<?php

Autoloader::register();


class AdminController 
{
    
    
    public function adminaccueilAction()
    {
        $ArticleManager = new ArticleManager();
        $posts = $ArticleManager->getArticles();
        require('view/adminView.php');
    }
    
    public function getArticleAction()
    {
        $ArticleManager = new ArticleManager($_GET['id']);
        $article = $ArticleManager->getArticle($_GET['id']);
        
        require('view/articleView.php');
    }
    
    public function reportedCommentsAction()
    {
        $CommentManager = new CommentManager();
        $reportedComments = $CommentManager->getReports();
        require('view/moderationView.php');
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
        header('location: index.php?controller=admin&action=reportedComments');
    }
    
    public function ignorerAction() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->ignoreReport($_GET['id']);
        
        header('location: index.php?controller=admin&action=reportedComments');
    }
    
    public function envoyerAction() 
    {
        $ArticleManager = new ArticleManager();
        $ArticleManager->postArticle($_POST["title"], $_POST["content"]);
        
        header('location: index.php?controller=admin&action=adminaccueil');
    }

    public function modifierAction() 
    {
        $ArticleManager = new ArticleManager();
        $ArticleManager->editArticle($_POST['id'], $_POST['title'], $_POST['content'],$_POST['sort']);
        
        header('location: index.php?controller=admin&action=getarticle&id='.$_POST['id']);
    }

    public function supprimerAction() 
    {
        $deleteArticle = new ArticleManager();
        $deleteArticle->deleteArticle($_GET['id'], $_GET['sort']);
        
        header('location: index.php?controller=admin&action=adminaccueil');
    }

}

