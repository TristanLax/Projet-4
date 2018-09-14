<?php $title = "Administration"; ?>

<?php ob_start(); ?>
<p><a href="index.php">Retourner sur le site</a></p>


<h1>Billet simple pour l'Alaska</h1>
<h2>Un roman de Jean Rochefort</h2>


<?php
{
?>
    <table>
      <tr><th>Numéro</th><th>Titre</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
<?php
    while ($data = $posts->fetch())
{
  echo '<tr><td>', $data['id'], '</td><td>', $data['title'], '</td><td>', $data['creation_date_fr'], '</td><td>', ($data['creation_date_fr'] == $data['edit_date_fr'] ? '-' : $data['edit_date_fr']), '</td><td>','<a href="modifier=', $data['id'], '">Modifier</a> | <a href="supprimer=', $data['id'], '">Supprimer</a> ', '</td></tr>';
}
?>
    </table>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>