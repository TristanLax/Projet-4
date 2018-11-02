<?php session_start();
$title = "Billet simple pour l'Alaska, un roman de Jean Rochefort"; ?>

<?php include("header.php"); ?>
<p><a href="login.php">Se connecter à l'espace d'administration</a></p>


<h1>Billet simple pour l'Alaska</h1>
<h2>Un roman de Jean Rochefort</h2>
<p>Derniers articles parus sur le site :</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= nl2br(htmlspecialchars($data['title'])) ?>
            <em>parue le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br /><em><a href="index.php?controller=front&action=getarticle&id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>