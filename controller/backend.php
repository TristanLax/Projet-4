<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

$manager = new \Tanamassar\Projet_4\Model\PostManager();

if (isset($_GET['supprimer']))
{
  $manager->Delete((int) $_GET['supprimer']);
  $message = 'La news a bien été supprimée !';
}

if (isset($message))
{
  echo $message, '<br />';
}

function listPosts()
{
    $postManager = new \Tanamassar\Projet_4\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/backend/adminView.php');
}

