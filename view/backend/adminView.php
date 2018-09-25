<?php $title = "Administration"; ?>

<?php ob_start(); ?>
<p><a href="index.php">Retourner sur le site</a></p>
<p><a href="moderation.php">Accèder à la modération des commentaires</a></p>


<h1>Billet simple pour l'Alaska</h1>

<h2>Un roman de Jean Rochefort</h2>

<?php
{
?>
<table>
    <tr>
        <th>Numéro</th>
        <th>Titre</th>
        <th>Date d'ajout</th>
        <th>Dernière modification</th>
        <th>Action</th>
    </tr>
    <?php
    while ($data = $posts->fetch())
{
   echo '<tr><td>', $data['id'], '</td><td>', $data['title'], '</td><td>', $data['creation_date_fr'], '</td><td>', ($data['creation_date_fr'] == $data['edit_date_fr'] ? '-' : $data['edit_date_fr']), '</td><td>','<a href="article.php?action=post&amp;id=', $data['id'], '">Modifier</a> | <a href="?supprimer=', $data['id'], '">Supprimer</a> ', '</td></tr>';
}
?>
</table>
<?php
}
$posts->closeCursor();
?>



<form method="post">
    <div>
        <label for="title">Titre :</label><br />
        <input type="text" id="title" name="title" />
    </div>
    <div>
        <label for="content">Contenu :</label><br />
        <textarea rows="8" cols="60" id="content" name="content"></textarea>
    </div>
    <div>
        <input type="submit" name="envoyer" />
    </div>
</form>



<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
