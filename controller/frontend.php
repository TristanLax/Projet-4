<?php

// Chargement des classes
require('\Autoloader.php');
Projet_4\Autoloader::register();


$getPost = new Projet_4\Model\getPost();
$getPosts = new Projet_4\Model\getPosts();


$reportComment = new Projet_4\Model\reportComment();
$getComments = new Projet_4\Model\getComments();
$postComment = new Projet_4\Model\postComment();




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
    $getPosts = new Projet_4\Model\getPosts();
    $posts = $getPosts->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $getPost = new Projet_4\Model\getPost();
    $getComments = new Projet_4\Model\getComments();

    $post = $getPost->getPost($_GET['id']);
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