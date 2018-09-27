<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/editArticle.php');
require_once('model/postArticle.php');
require_once('model/deleteArticle.php');
require_once('model/getPost.php');
require_once('model/getPosts.php');


require_once('model/CommentManager.php');
require_once('model/ignoreReport.php');
require_once('model/moderateComment.php');
require_once('model/getReports.php');

$manager = new \Tanamassar\Projet_4\Model\PostManager();
$editArticle = new \Tanamassar\Projet_4\Model\editArticle();
$postArticle = new \Tanamassar\Projet_4\Model\postArticle();
$deleteArticle = new \Tanamassar\Projet_4\Model\deleteArticle();
$getPost = new \Tanamassar\Projet_4\Model\getPost();
$getPosts = new \Tanamassar\Projet_4\Model\getPosts();


$commentManager = new \Tanamassar\Projet_4\Model\CommentManager();
$moderateComment = new \Tanamassar\Projet_4\Model\moderateComment();
$ignoreReport = new \Tanamassar\Projet_4\Model\ignoreReport();
$getReports = new \Tanamassar\Projet_4\Model\getReports();


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
    $editArticle = new \Tanamassar\Projet_4\Model\editArticle();
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
    $getPosts = new \Tanamassar\Projet_4\Model\getPosts();
    $posts = $getPosts->getPosts();

    require('view/backend/adminView.php');
}

function post()
{
    $getPost = new \Tanamassar\Projet_4\Model\getPost();
    $post = $getPost->getPost($_GET['id']);

    require('view/backend/articleView.php');
}

function reportedComments()
{
    $getReports = new \Tanamassar\Projet_4\Model\getReports();
    $reportedComment = $getReports->getReports();

    require('view/backend/moderationView.php');
}


