<?php

require_once('Controller.php');


class FrontController extends Controller  {
    
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
        $getComments = $CommentManager->getComments($_GET['id']);

        require('view/postView.php');
    }

    public function signalerAction() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->reportComment((int) $_GET['signaler']); 
    }


    public function addCommentAction($postId, $author, $comment) 
    {
        $CommentManager = new CommentManager();
        $affectedLines = $CommentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
    
}