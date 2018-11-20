<?php if (!isset($_SESSION['secured'])) 
{
    header("location: index.php");
}
?>

<?php include("header.php");
$title = "Moderation"; ?>

<p><a href="index.php?controller=admin&action=Adminaccueil">Retourner à l'espace d'administration</a></p>


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
   echo '<tr><td>', $comment->getAuthor(), '</td><td>',$comment->getComment(), '</td><td>', $comment->getReports(), '</td><td>', '<a href="index.php?controller=admin&action=ignorer&id=', $comment->getId(), '">Ignorer</a> | <a href="index.php?controller=admin&action=moderer&id=', $comment->getId(), '">Moderer</a> ', '</td></tr>';
}
?>
</table>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>