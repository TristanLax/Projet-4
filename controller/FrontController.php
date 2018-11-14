<?php

Autoloader::register();


class FrontController
{
    
    public function AccueilAction() 
    {
        $ArticleManager = new ArticleManager();
        $posts = $ArticleManager->getArticles();
        require('view/listPostsView.php');
    }
    
    public function GetarticleAction() 
    {
        $ArticleManager = new ArticleManager($_GET['id']);
        $CommentManager = new CommentManager($_GET['id']);

        $article = $ArticleManager->getArticle($_GET['id']);
        $comments = $CommentManager->getComments($_GET['id']);

        require('view/postView.php');
    }

    public function signalerAction() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->reportComment($_GET['id']); 
        
        header('Location: index.php');
    }


    public function addcommentAction() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->postComment($_POST["article_id"], $_POST["author"], $_POST["comment"]);

        header('Location: index.php?controller=front&action=getarticle&id='. $_POST['article_id']);
    }
    
}