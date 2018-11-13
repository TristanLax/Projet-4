<?php

Autoloader::register();


class AdminController 
{
    
    
    public function AdminaccueilAction()
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
    
    public function moderer() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->moderateComment((int) $_GET['moderer']);
    }
    
    public function ignorer() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->ignoreReport((int) $_GET['ignorer']);
    }
    
    public function envoyerAction() 
    {
        $ArticleManager = new ArticleManager();
        $ArticleManager->postArticle($_POST["title"], $_POST["content"]);
        header('location: index.php?controller=admin&action=Adminaccueil');
    }

    public function modifier() 
    {
        $ArticleManager = new ArticleManager();
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $edit = $ArticleManager->editArticle($id, $title, $content);
    }

    public function supprimer() 
    {
        $deleteArticle = new ArticleManager();
        $deleteArticle->deleteArticle((int) $_GET['supprimer']);
    }

}

