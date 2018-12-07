<?php


class AdminController 
{
    
    /* Constructeur vérifiant si l'utilisateur est connecté grace à la session, et le renvoie a l'acceuil si il ne l'est pas. */
    
    public function __construct()
    {
        if (!isset($_SESSION['secured'])) {
            header("location: index.php");
        }
    }
    
    /* Fonctionne de la même façon que l'action accueil de la partie utilisateur. */
    
    public function adminaccueilAction()
    {
        $ChapitreManager = new ChapitreManager();
        $chapitres = $ChapitreManager->getChapitres();
        require('view/admin.php');
    }
    
    /* Fonctionne de la même façon que l'action getChapitre de la partie utilisateur, ne récupérant juste pas les commentaires. */
    public function getchapitreAction()
    {
        $ChapitreManager = new ChapitreManager($_GET['id']);
        $chapitre = $ChapitreManager->getChapitre($_GET['id']);
        require('view/adminChapitre.php');
    }
    
    /* Récupère via le manager et sa fonction GetReport la liste de tous les commentaires dans le bon ordre pour pouvoir les afficher dans la vue. */
    
    public function reportedcommentsAction()
    {
        $CommentManager = new CommentManager();
        $reportedComments = $CommentManager->getReports();
        require('view/moderation.php');
    }
    
    /* Envoie l'ID du commentaire a moderer au Manager appellant ensuite la fonction nécéssaire pour accomplir l'action.  */
    
    public function modererAction() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->moderateComment($_GET['id']);
    }
    
    /* Exactement le même fonctionnement que la methode ci-dessus, appellant juste une methode différente.  */
    
    public function ignorerAction() 
    {
        $CommentManager = new CommentManager();
        $CommentManager->ignoreReport($_GET['id']);
    }
    
    /* Methode envoyant au Manager le contenu du form présent en partie admin pour écrire de nouveaux commentaires puis affiche la page mise à jour. */
    
    public function envoyerAction() 
    {
        $ChapitreManager = new ChapitreManager();
        $ChapitreManager->postChapitre($_POST["title"], $_POST["content"]);
        
        header('location: index.php?controller=admin&action=adminaccueil');
    }
    
    /* Envoie au Manager l'ID, le titre, le contenu et le sort pour lui permettre de mettre a jour l'article édité, puis affiche la page mise à jour. */
    
    public function modifierAction() 
    {
        $ChapitreManager = new ChapitreManager();
        $ChapitreManager->editChapitre($_POST['id'], $_POST['title'], $_POST['content'],$_POST['sort']);
        
        header('location: index.php?controller=admin&action=getchapitre&id='.$_POST['id']);
    }

    /* Envoie au Manager l'ID du chapitre et son sort pour permettre leur traitement et la suppression de l'article. */
    
    public function supprimerAction() 
    {
        $ChapitreManager = new ChapitreManager();
        $ChapitreManager->deleteChapitre($_GET['id'], $_GET['sort']);
    }
    
    /* Methode assez simple permettant de simplement détruire la session pour se déconnecter avant de guider l'utilisateur sur l'accueil du site. */
    
    public function logoutAction()
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }
    
}

