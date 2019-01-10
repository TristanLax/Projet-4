<?php


class FrontController
{ 

    /* Appelle puis envoie au CommentManager l'ID du chapitre que l'utilisateur souhaite signaler pour lui permettre de traiter la requête via reportComment. */
    
    public function signalerAction() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->reportComment($_GET['id']); 
    }


    /* Methode passant au manager l'ID du chapitre sur lequel le commentaire est écrit ainsi que le nom de l'auteur et le contenu du commentaire pour les faire traiter en DB via la methode postComment. */
    
    public function addcommentAction() 
    {
        $CommentManager = new CommentManager();
        
        if (empty($_POST["author"]) or empty($_POST["comment"])) {
            throw new Exception('Commentaire invalide !');
        }
        else {
            $addComment = $CommentManager->postComment($_POST["chapitre_id"], $_POST["author"], $_POST["comment"]);
            header('Location: index.php?controller=home&action=getchapitre&id='. $_POST['chapitre_id']);
        }
    }
    
}