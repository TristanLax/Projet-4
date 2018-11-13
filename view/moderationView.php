<?php $title = "Moderation"; ?>

<?php if (!isset($_SESSION['secured'])) 
{
    header("location: index.php");
}
?>

<?php ob_start(); ?>
<p><a href="index.php?controller=admin&action=Adminaccueil">Retourner à l'espace d'administration</a></p>


<h1>Billet simple pour l'Alaska</h1>

<p>Liste des commentaires signalés :</p>
<?php
{
?>
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
   echo '<tr><td>', $comment->getAuthor(), '</td><td>',$comment->getComment(), '</td><td>', $comment->getReports(), '</td><td>', '<a href="?ignorer=', $comment->getId(), '">Ignorer</a> | <a href="?moderer=', $comment->getId(), '">Moderer</a> ', '</td></tr>';
}
?>
</table>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>