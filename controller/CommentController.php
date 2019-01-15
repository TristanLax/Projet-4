<?php


class CommentController extends AdminController
{
    
    /* Récupère via le manager et sa fonction GetReport la liste de tous les commentaires dans le bon ordre pour pouvoir les afficher dans la vue. */
    
    public function reportedcommentsAction()
    {
        $chapitreId = null;
        
        if (isset($_GET['chapitre-id'])){
            $chapitreId = $_GET['chapitre-id'];
        }
        
        $CommentManager = new CommentManager();
        $ChapitreManager = new ChapitreManager();
        $chapitres = $ChapitreManager->getAllChapitres();
        $reportedComments = $CommentManager->getReports($chapitreId);
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

}

