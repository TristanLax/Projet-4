<?php if (!isset($_SESSION['secured'])) 
{
    header("location: index.php");
} ?>

<?php include("header.php"); ?>
<?php $title = htmlspecialchars($article->getTitle()); ?>

<div class="row">
    <div class="col-lg-12">
        <p><a href="index.php?controller=admin&action=Adminaccueil">Retour a l'Administration</a></p>

            <div class="col-lg-12 news mainpage">
                <div class="newsheader">
                    <h3>
                        <?= $article->getTitle()?>
                        , article paru le <?= $article->getDate() ?> et mis à jour le <?=($article->getDate() == $article->getEdit() ? : $article->getEdit()) ?>
                    </h3>
                </div>
                <div class="newstext">
                    <p><?= $article->getContent() ?></p>
                </div>
            </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mainpage">
        
        <h2>Editer l'article :</h2>
        <form method="post" action="index.php?controller=admin&action=modifier">
            <div>
                <label for="title">Titre :</label><br />
                <input type="text" id="title" name="title" size="30" value="<?= $article->getTitle(); ?>" />
            </div>
            <div>
                <label for="content">Contenu :</label><br />
                <textarea rows="8" cols="60" id="content" name="content" value=""></textarea>            
            </div>
            <div>
                <input type="hidden" name="id" value="<?= $article->getId()?>" />
                <input type="submit" name="modifier" />
            </div>
        </form>

    </div>
</div>

<?php include("footer.php"); ?>
<?php require('template.php'); ?>