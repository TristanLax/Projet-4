<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/getPost.php');
require_once('model/getPosts.php');


require_once('model/CommentManager.php');
require_once('model/reportComment.php');
require_once('model/getComments.php');
require_once('model/postComment.php');


$getPost = new \Tanamassar\Projet_4\Model\getPost();
$getPosts = new \Tanamassar\Projet_4\Model\getPosts();


$commentManager = new \Tanamassar\Projet_4\Model\commentManager();
$reportComment = new \Tanamassar\Projet_4\Model\reportComment();
$getComments = new \Tanamassar\Projet_4\Model\getComments();
$postComment = new \Tanamassar\Projet_4\Model\postComment();



if (isset($message))
{
  echo $message, '<br />';
}

if (isset($_GET['signaler']))
{
  $reportComment->reportComment((int) $_GET['signaler']);
  $message = 'La news a bien été supprimée !';
}

function listPosts()
{
    $getPosts = new \Tanamassar\Projet_4\Model\getPosts();
    $posts = $getPosts->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $getPost = new \Tanamassar\Projet_4\Model\getPost();
    $getComments = new \Tanamassar\Projet_4\Model\getComments();

    $post = $getPost->getPost($_GET['id']);
    $getComments = $getComments->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $postComment = new \Tanamassar\Projet_4\Model\postComment();

    $affectedLines = $postComment->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}