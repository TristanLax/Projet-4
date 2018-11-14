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

<form method="post" action="index.php?controller=front&action=addComment&id=<?=$article->getId() ?>">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>   
        <input type="hidden" name="article_id" value="<?= $article->getId()?>" />
        <input type="submit" />
    </div>
</form>

<?php
foreach ($comments as $comment)
{
?>
    <p><strong><?= htmlspecialchars($comment->getAuthor()) ?></strong> le <?= $comment->getDate() ?></p>
    <p><?= nl2br(htmlspecialchars($comment->getComment())) ?></p>
    <a href="index.php?controller=front&action=signaler&id=<?=$comment->getId()?>">Signaler ce commentaire</a>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>