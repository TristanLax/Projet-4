<?php if (!isset($_SESSION['secured'])) 
{
    header("location: index.php");
} ?>

<?php include("header.php"); ?>
<?php $title = htmlspecialchars($article->getTitle()); ?>

<p><a href="index.php?controller=admin&action=Adminaccueil">Retour a l'Administration</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($article->getTitle()) ?>
        <em>parue le <?= $article->getDate() ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($article->getContent())) ?>
    </p>
</div>
<div>
<h1>Editer l'article :</h1>
    
    <form method="post" action="index.php?controller=admin&action=modifier">
    <div>
        <label for="title">Titre :</label><br />
        <input type="text" id="title" name="title" />
    </div>
    <div>
        <label for="content">Contenu :</label><br />
        <textarea rows="8" cols="60" id="content" name="content"></textarea>
    </div>
    <div>
        <input type="hidden" name="id" value="<?= $article->getId()?>" />
        <input type="submit" name="modifier" />
    </div>
</form>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>