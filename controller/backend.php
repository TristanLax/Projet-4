<?php

// Chargement des classes
require_once('model/PostManager.php');

$manager = new \Tanamassar\Projet_4\Model\PostManager();

if (isset($_GET['supprimer']))
{
  $manager->Delete((int) $_GET['supprimer']);
  $message = 'La news a bien été supprimée !';
}

if (isset($_POST['envoyer']))
{
    $manager->postArticle($_POST["title"], $_POST["content"]);
    $message = 'La news a bien été ajoutée !';
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

function post()
{
    $postManager = new \Tanamassar\Projet_4\Model\PostManager();
    $post = $postManager->getPost($_GET['id']);

    require('view/backend/articleView.php');
}



