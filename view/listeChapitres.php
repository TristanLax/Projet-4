<?php $title = "Billet simple pour l'Alaska, un roman de Jean Rochefort"; ?>

<?php include("header.php"); ?>

    <div class ="row">
        <div class="col-lg-12"> 
            <p><a href="index.php?controller=login&action=Loginaccueil">Se connecter à l'espace d'administration</a></p>
            <p class="mainpage">Derniers chapitres parus sur le site :</p>
            <div class ="row">
<?php
 foreach ($chapitres as $chapitre)
{
?>
            <div class="col-lg-6">
                <div class="col-lg-12 news">
                    <div class="newsheader">
                        <h3>
                            Chapitre <?= $chapitre->getSort() ?> : <?= $chapitre->getTitle()?>
                        </h3>
                    </div>
                    <div class="newstext">
                    <p>
                        <?= $chapitre->getContent() ?>
                    </p>
                    </div>
                        <p class="lien"><a href="index.php?controller=front&action=getchapitre&id=<?= $chapitre->getId() ?>">Accéder au chapitre</a></p>
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