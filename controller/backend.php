<?php

require('\Autoloader.php');
Projet_4\Autoloader::register();

$editArticle = new Projet_4\Model\editArticle();
$postArticle = new Projet_4\Model\postArticle();
$deleteArticle = new Projet_4\Model\deleteArticle();
$getPost = new Projet_4\Model\getPost();
$getPosts = new Projet_4\Model\getPosts();

$getSession = new Projet_4\Model\Session();
$getUser = new Projet_4\Model\User();

$moderateComment = new Projet_4\Model\moderateComment();
$ignoreReport = new Projet_4\Model\ignoreReport();
$getReports = new Projet_4\Model\getReports();


if (isset($_GET['supprimer']))
{
  $deleteArticle->deleteArticle((int) $_GET['supprimer']);
  $message = 'La news a bien été supprimée !';
}

if (isset($_POST['envoyer']))
{
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
    $ignoreReport->ignoreReport((int) $_GET['ignorer']);
    $message = 'Le commentaire a bien été retiré de la liste de modération !';
}

if (isset($_GET['moderer']))
{
    $moderateComment->moderateComment((int) $_GET['moderer']);
    $message = 'Le commentaire a bien été modéré !'; 
}


if (isset($message))
{
  echo $message, '<br />';
}


function listPosts()
{
    $getPosts = new Projet_4\Model\getPosts();
    $posts = $getPosts->getPosts();

    require('view/backend/adminView.php');
}

function post()
{
    $getPost = new Projet_4\Model\getPost();
    $post = $getPost->getPost($_GET['id']);

    require('view/backend/articleView.php');
}

function reportedComments()
{
    $getReports = new Projet_4\Model\getReports();
    $reportedComment = $getReports->getReports();

    require('view/backend/moderationView.php');
}


