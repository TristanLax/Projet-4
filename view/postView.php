<?php $title = htmlspecialchars($article->getTitle()); ?>

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

<form action="index.php?controller=front&action=addComment&amp;id=<?=$article->getId() ?>" method="post">
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
foreach ($comments as $comment)
{
?>
    <p><strong><?= htmlspecialchars($comment->getAuthor()) ?></strong> le <?= $comment->getDate() ?></p>
    <p><?= nl2br(htmlspecialchars($comment->getComment())) ?></p>
    <a href="?signaler=<?=$comment->getId()?>">Signaler ce commentaire</a>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>