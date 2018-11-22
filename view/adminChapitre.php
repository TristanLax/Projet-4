
<?php if (!isset($_SESSION['secured'])) 
{
    header("location: index.php");
} ?>

<?php include("header.php"); ?>
<?php $title = $chapitre->getTitle(); ?>

<div class="row">
    <div class="col-lg-12">
        <p><a href="index.php?controller=admin&action=Adminaccueil">Retour a l'Administration</a></p>

            <div class="col-lg-12 news mainpage">
                <div class="newsheader">
                    <h3>
                        Chapitre <?= $chapitre->getSort() ?> : <?= $chapitre->getTitle()?>, chapitre paru le <?= $chapitre->getDate() ?> et mis à jour pour la dernière fois le <?=($chapitre->getDate() == $chapitre->getEdit() ? : $chapitre->getEdit()) ?>
                    </h3>
                </div>
                <div class="newstext">
                    <p><?= $chapitre->getContent() ?></p>
                </div>
            </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mainpage">
        
        <h2>Editer le chapitre :</h2>
        <form method="post" action="index.php?controller=admin&action=modifier">
            <div>
                <label for="title">Titre :</label><br />
                <input type="text" id="title" name="title" size="30" value="<?= $chapitre->getTitle(); ?>" /><br />
                <label for="sort">Numéro du chapitre :</label><br />
                <input type="text" id="sort" name="sort" size="30" value="<?= $chapitre->getSort(); ?>" />
            </div>
            <div>
                <label for="content">Contenu :</label><br />
                <textarea rows="8" cols="60" id="content" name="content" value=""><?= $chapitre->getContent(); ?></textarea>            
            </div>
            <div>
                <input type="hidden" name="id" value="<?= $chapitre->getId()?>" />
                <input type="submit" name="modifier" />
            </div>
        </form>

    </div>
</div>

<?php include("footer.php"); ?>
<?php require('template.php'); ?>