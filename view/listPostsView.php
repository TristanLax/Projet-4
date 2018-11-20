<?php $title = "Billet simple pour l'Alaska, un roman de Jean Rochefort"; ?>

<?php include("header.php"); ?>
<p><a href="index.php?controller=login&action=Loginaccueil">Se connecter à l'espace d'administration</a></p>


    <div class ="row">
        <div class="col-lg-12"> <p>Derniers articles parus sur le site :</p>
            <div class ="row">
<?php
 foreach ($posts as $article)
{
?>
            <div class="col-lg-6">
                <div class="col-lg-12 news">
                    <div class="newsheader">
                        <h3>
                            <?= $article->getTitle()?>
                            , un article écrit le <?= $article->getDate() ?>
                        </h3>
                    </div>
                    <div class="newstext">
                    <p>
                        <?= $article->getContent() ?>
                    </p>
                    </div>
                        <p class="lien"><a href="index.php?controller=front&action=getarticle&id=<?= $article->getId() ?>">Accéder à l'article</a></p>
                </div>
                </div>
<?php
}
?>
                    
            </div>
        </div>
    </div>



<?php include("footer.php"); ?>

<?php require('template.php'); ?>