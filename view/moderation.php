<?php if (!isset($_SESSION['secured'])) 
{
    header("location: index.php");
}
?>

<?php include("header.php");
$title = "Moderation"; ?>


<div class ="row">
    <div class="col-lg-12" id="menu">
        <nav>
            <ul class="menu">
                <li><a href="index.php?controller=admin&action=Adminaccueil">Retourner à l'espace d'administration</a></li>
            </ul>
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

            <?php
            foreach ($reportedComments as $comment)
            { 
            ?>
                <tr>
                    <td> <?= $comment->getAuthor() ?> </td>
                    <td> <?= $comment->getComment() ?> </td>
                    <td> <?= $comment->getReports() ?> </td>
                    <td> <a href="index.php?controller=admin&action=ignorer&id=<?= $comment->getId() ?>">Ignorer</a> |
                         <a href="index.php?controller=admin&action=moderer&id=<?= $comment->getId() ?>">Moderer</a>
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