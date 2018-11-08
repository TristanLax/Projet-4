<?php

Autoloader::register();


class AdminController extends Controller {
    
    
    public function AdminaccueilAction()
    {
        $ArticleManager = new ArticleManager();
        $posts = $ArticleManager->getArticles();
        require('view/adminView.php');
    }
    
    public function moderer() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->moderateComment((int) $_GET['moderer']);
    }
    
    public function ignorer() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->ignoreReport((int) $_GET['ignorer']);
    }
    
    public function envoyer() 
    {
        $ArticleManager = new ArticleManager();
        $ArticleManager->postArticle($_POST["title"], $_POST["content"]);
    }

    public function modifier() 
    {
        $ArticleManager = new ArticleManager();
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $edit = $ArticleManager->editArticle($id, $title, $content);
    }

    public function supprimer() 
    {
        $deleteArticle = new ArticleManager();
        $deleteArticle->deleteArticle((int) $_GET['supprimer']);
    }

    public function post()
    {
        $ArticleManager = new ArticleManager('id');
        $post = $ArticleManager->getArticle($_GET['id']);
        require('view/articleView.php');
    }

    public function reportedComments()
    {
        $CommentManager = new CommentManager();
        $reportedComment = $CommentManager->getReports();
        require('view/moderationView.php');
    }

}

