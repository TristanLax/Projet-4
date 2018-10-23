<?php

require_once('Controller.php');


class FrontController extends Controller {

function signaler() {
    
    $reportComment = new Projet_4\Model\reportComment();
    $reportComment->reportComment((int) $_GET['signaler']); 
}

function listPosts() {
    
    $getArticles = new Projet_4\Model\getArticles();
    $posts = $getArticles->getArticles();
    require('view/frontend/listPostsView.php');
}

function post() {
    $getArticle = new Projet_4\Model\getArticle();
    $getComments = new Projet_4\Model\getComments();

    $post = $getArticle->getArticle($_GET['id']);
    $getComments = $getComments->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment) 
{
    $postComment = new Projet_4\Model\postComment();

    $affectedLines = $postComment->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
    
}