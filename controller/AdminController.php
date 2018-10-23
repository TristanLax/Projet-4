<?php

require('\Autoloader.php');
Projet_4\Autoloader::register();


if (isset($_GET['supprimer']))
{
    $deleteArticle = new Projet_4\Model\deleteArticle();
    $deleteArticle->deleteArticle((int) $_GET['supprimer']);
    $message = 'La news a bien été supprimée !';
}

if (isset($_POST['envoyer']))
{
    $postArticle = new Projet_4\Model\postArticle();
    $postArticle->postArticle($_POST["title"], $_POST["content"]);
    $message = 'La news a bien été ajoutée !';
}

if (isset($_POST['modifier']))
{
    $editArticle = new Projet_4\Model\editArticle();
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $edit = $editArticle->editArticle($id, $title, $content);

    $message = 'La news a bien été mise à jour !'; 
}

if (isset($_GET['ignorer']))
{
    $ignoreReport = new Projet_4\Model\ignoreReport();
    $ignoreReport->ignoreReport((int) $_GET['ignorer']);
    $message = 'Le commentaire a bien été retiré de la liste de modération !';
}

if (isset($_GET['moderer']))
{
    $moderateComment = new Projet_4\Model\moderateComment();
    $moderateComment->moderateComment((int) $_GET['moderer']);
    $message = 'Le commentaire a bien été modéré !'; 
}


if (isset($message))
{
  echo $message, '<br />';
}


function listPosts()
{
    $getArticles = new Projet_4\Model\getArticles();
    $posts = $getArticles->getArticles();

    require('view/backend/adminView.php');
}

function post()
{
    $getArticle = new Projet_4\Model\getArticle();
    $post = $getArticle->getArticle($_GET['id']);

    require('view/backend/articleView.php');
}

function reportedComments()
{
    $getReports = new Projet_4\Model\getReports();
    $reportedComment = $getReports->getReports();

    require('view/backend/moderationView.php');
}


