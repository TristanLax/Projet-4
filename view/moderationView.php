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
    while ($data = $reportedComment->fetch())
{
   echo '<tr><td>', $data['author'], '</td><td>', $data['comment'], '</td><td>', $data['reports'], '</td><td>', '<a href="?ignorer=', $data['id'], '">Ignorer</a> | <a href="?moderer=', $data['id'], '">Moderer</a> ', '</td></tr>';
}
?>
</table>
<?php
}
$reportedComment->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>