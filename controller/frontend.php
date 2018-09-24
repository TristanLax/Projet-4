<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

$commentManager = new \Tanamassar\Projet_4\Model\commentManager();

if (isset($message))
{
  echo $message, '<br />';
}

if (isset($_GET['signaler']))
{
  $commentManager->reportComment((int) $_GET['signaler']);
  $message = 'La news a bien été supprimée !';
}

function listPosts()
{
    $postManager = new \Tanamassar\Projet_4\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \Tanamassar\Projet_4\Model\PostManager();
    $commentManager = new \Tanamassar\Projet_4\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \Tanamassar\Projet_4\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}