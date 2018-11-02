<?php

require_once('Controller.php');
require('Autoloader.php');
Autoloader::register();


class AdminController extends Controller {
    
    
public function moderer() {
    $moderateComment = new moderateComment();
    $moderateComment->moderateComment((int) $_GET['moderer']);
}
    
public function ignorer() {
    $ignoreReport = new ignoreReport();
    $ignoreReport->ignoreReport((int) $_GET['ignorer']);
}
    
public function envoyer() {
    $postArticle = new postArticle();
    $postArticle->postArticle($_POST["title"], $_POST["content"]);
}
    
public function modifier() {
    $editArticle = new editArticle();
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $edit = $editArticle->editArticle($id, $title, $content);
}
    
public function supprimer() {
    
    $deleteArticle = new deleteArticle();
    $deleteArticle->deleteArticle((int) $_GET['supprimer']);
}


public function listPosts()
{
    $getArticles = new getArticles();
    $posts = $getArticles->getArticles();

    require('view/adminView.php');
}

    public function post()
{
    $getArticle = new getArticle();
    $post = $getArticle->getArticle($_GET['id']);

    require('view/articleView.php');
}

    public function reportedComments()
{
    $getReports = new getReports();
    $reportedComment = $getReports->getReports();

    require('view/moderationView.php');
}

}

