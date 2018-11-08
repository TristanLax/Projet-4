<?php session_start();
$title = "Administration"; ?>

<?php if (!isset($_SESSION['secured'])) 
{
    header("location: index.php");
}
?>


<?php ob_start(); ?>
<p><a href="index.php">Retourner sur le site</a></p>
<p><a href="moderation.php">Accèder à la modération des commentaires</a></p>
<p><a href="logout.php">Se deconnecter</a></p>


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
    
foreach ($posts as $article)
{
   echo '<tr><td>', $article->getId(), '</td><td>', $article->getTitle(), '</td><td>', $article->getDate(), '</td><td>', ($article->getDate() == $article->getEdit() ? '-' : $article->getEdit()), '</td><td>','<a href="article.php?action=post&amp;id=', $article->getId(), '">Modifier</a> | <a href="?supprimer=', $article->getId(), '">Supprimer</a> ', '</td></tr>';
}
?>
</table>
<?php
}
?>



<form method="post" action="<?php echo 'admin.php?action=envoyer' ?>">
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