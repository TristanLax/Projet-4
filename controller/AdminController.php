<?php

require_once('Controller.php');


class AdminController extends Controller {
    
    
public function moderer() {
    $moderateComment = new Projet_4\Model\moderateComment();
    $moderateComment->moderateComment((int) $_GET['moderer']);
}
    
public function ignorer() {
    $ignoreReport = new Projet_4\Model\ignoreReport();
    $ignoreReport->ignoreReport((int) $_GET['ignorer']);
}
    
public function envoyer() {
    $postArticle = new Projet_4\Model\postArticle();
    $postArticle->postArticle($_POST["title"], $_POST["content"]);
}
    
public function modifier() {
    $editArticle = new Projet_4\Model\editArticle();
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $edit = $editArticle->editArticle($id, $title, $content);
}
    
public function supprimer() {
    
    $deleteArticle = new Projet_4\Model\deleteArticle();
    $deleteArticle->deleteArticle((int) $_GET['supprimer']);
}


public function listPosts()
{
    $getArticles = new Projet_4\Model\getArticles();
    $posts = $getArticles->getArticles();

    require('view/backend/adminView.php');
}

    public function post()
{
    $getArticle = new Projet_4\Model\getArticle();
    $post = $getArticle->getArticle($_GET['id']);

    require('view/backend/articleView.php');
}

    public function reportedComments()
{
    $getReports = new Projet_4\Model\getReports();
    $reportedComment = $getReports->getReports();

    require('view/backend/moderationView.php');
}

}

