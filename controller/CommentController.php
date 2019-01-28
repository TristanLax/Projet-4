<?php


class CommentController extends AdminController
{
    
    /* Récupère via le manager et sa fonction GetReport la liste de tous les commentaires, qu'ils soient signalés ou non. Gère aussi la possibilité d'utiliser l'ID précise d'un chapitre pour pouvoir n'afficher que les commentaires de ce dernier, ainsi qu'une possibilité de n'afficher que les commentaires avec des reports ou non. */
    
    public function reportslistAction()
    {
        $chapitreId = null;
        if (isset($_GET['chapitre-id'])){
            $chapitreId = $_GET['chapitre-id'];
        }
        
        $CommentManager = new CommentManager();
        $ChapitreManager = new ChapitreManager();
        $chapitres = $ChapitreManager->getAllChapitres();
        
        $report = $_GET['reports'] ?? null;
        $reportedComments = $CommentManager->getReports($chapitreId, $report);
        
        require(dirname(__FILE__).'/../View/moderation.php');
    }
    
    /* Envoie l'ID du commentaire a moderer au Manager appellant ensuite la fonction nécéssaire pour accomplir l'action qui édite le commentaire en un message pré-programmé.  */
    
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

