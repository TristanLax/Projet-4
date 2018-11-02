<?php

require_once('Controller.php');


class FrontController extends Controller  {
    
    public function AccueilAction() 
    {
        $getArticles = new getArticles();
        $posts = $getArticles->getArticles();
        require('view/listPostsView.php');
    }
    
    public function GetarticleAction() 
    {
        $getArticle = new getArticle($_GET['id']);
        $getComments = new getComments($_GET['id']);

        $post = $getArticle->getArticle($_GET['id']);
        $getComments = $getComments->getComments($_GET['id']);

        require('view/postView.php');
    }

    public function signaler() 
    {
        $reportComment = new reportComment();
        $reportComment->reportComment((int) $_GET['signaler']); 
    }


    public function addComment($postId, $author, $comment) 
    {
        $postComment = new postComment();
        $affectedLines = $postComment->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
    
}