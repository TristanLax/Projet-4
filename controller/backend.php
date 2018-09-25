<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

$manager = new \Tanamassar\Projet_4\Model\PostManager();
$commentManager = new \Tanamassar\Projet_4\Model\CommentManager();

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

if (isset($_POST['modifier']))
{
    $postManager = new \Tanamassar\Projet_4\Model\PostManager();
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $edit = $postManager->editArticle($id, $title, $content);

    $message = 'La news a bien été mise à jour !'; 
}

if (isset($_GET['ignorer']))
{
    $commentManager->ignoreReport((int) $_GET['ignorer']);
    $message = 'Le commentaire a bien été retiré de la liste de modération !';
}

if (isset($_GET['moderer']))
{
    $commentManager->moderateComment((int) $_GET['moderer']);
    $message = 'Le commentaire a bien été modéré !'; 
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

function reportedComments()
{
    $commentManager = new \Tanamassar\Projet_4\Model\CommentManager();
    $reportedComment = $commentManager->getReports();

    require('view/backend/moderationView.php');
}


