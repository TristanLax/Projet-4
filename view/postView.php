<?php session_start();
$title = htmlspecialchars($article->getTitle()); ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p><a href="index.php">Retour au site</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($article->getTitle()) ?>
        <em>parue le <?= $article->getDate() ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($article->getContent())) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?=$article->getId() ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php
while ($comments = $getComments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comments['author']) ?></strong> le <?= $comments['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comments['comment'])) ?></p>
    <a href="?signaler=<?=$comments['id']?>">Signaler ce commentaire</a>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>