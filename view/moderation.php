<?php include("header.php");
$title = "Moderation"; ?>


<div class="row">
    <div class="col-lg-12" id="menu">
        <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarText" >
                
                <div class="navbar-nav mr-auto">
                    <a class="nav-item nav-link" href="index.php">Retourner a l'accueil</a>
                    <a class="nav-item nav-link" href="index.php?controller=chapitre&action=adminList">Retourner à l'espace d'administration</a>
                    <a class="nav-item nav-link" href="index.php?controller=chapitre&action=ecrirechapitre">Ecrire un nouveau chapitre</a>
                </div>
                
                <div class="navbar-nav">
                  <a class="nav-item nav-link" href="index.php?controller=admin&action=logout">Se déconnecter</a>
                </div>
                
            </div>
            
        </nav>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        
        <h2 class="mainpage">Moderation des commentaires :</h2>
        <p class="supporttitle">Liste des commentaires signalés :</p>

            <table>
                <tr>
                    <th>Auteur</th>
                    <th>Commentaire</th>
                    <th>Nombre signalement</th>
                    <th>Action</th>
                </tr>
                
            <!-- Retourne les objets commentaires présents en DB sous forme d'un tableau pour faciliter leur modération si nécéssaire, affichant les commentaires par ordre de nombre de signalements reçus. -->
                
            <?php
            foreach ($reportedComments as $comment) { 
            ?>
                <tr>
                    <td> <?= $comment->getAuthor() ?> </td>
                    <td class="moderate_<?= $comment->getId()?>"> <?= $comment->getComment() ?> </td>
                    <td class="report_<?= $comment->getId()?>"> <?= $comment->getReports() ?> </td>
                    <td> <a class="ignorer" data-commentid="<?= $comment->getId()?>" href="#">Ignorer</a> |
                         <a class="moderer" data-commentid="<?= $comment->getId()?>" href="#">Moderer</a>
                    </td>
                </tr>
            <?php 
            }
            ?>
            </table>
        
   </div> 
</div>


<?php include("footer.php"); ?>
<?php require('template.php'); ?>