<?php session_start();
$title = "Billet simple pour l'Alaska, un roman de Jean Rochefort"; ?>

<?php include("header.php"); ?>
<p><a href="index.php?controller=login&action=Loginaccueil">Se connecter à l'espace d'administration</a></p>


<h1>Billet simple pour l'Alaska</h1>
<h2>Un roman de Jean Rochefort</h2>
<p>Derniers articles parus sur le site :</p>


<?php
 foreach ($posts as $article)
{
?>
    <div class="news">
        <h3>
            <?= nl2br(htmlspecialchars($article->getTitle())) ?>
            <em>parue le <?= $article->getDate() ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($article->getContent())) ?>
            <br /><em><a href="index.php?controller=front&action=getarticle&id=<?= $article->getId() ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>