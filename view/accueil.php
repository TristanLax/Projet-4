<?php $title = "Billet simple pour l'Alaska, un roman de Jean Rochefort";
include("header.php"); ?>


<div class="row">
    <div class="col-lg-12" id="menu">
        <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarText" >
                
                <div class="navbar-nav mr-auto">
                    <a class="nav-item nav-link" href="index.php?controller=login&action=loginaccueil">Se connecter à l'espace d'administration</a>
                </div>
                
            </div>
            
        </nav>
    </div>
</div>


<div class ="row">
    <div class="col-lg-12">
        
        <p class="mainpage">Derniers chapitres parus sur le site :</p>
        
            <div class ="row">
                
            <!-- Retourne la liste des objets chapitres disponibles sur le site depuis la DB puis les arrange graçe à bootstrap pour les placer correctement dans le flux de la page. -->
                
            <?php
            foreach ($chapitres as $chapitre) {
                
                if (strlen($chapitre->getContent()) <= 300)
                    {
                      $content = $chapitre->getContent();
                    }
                    else {
                        $start = substr($chapitre->getContent(), 0, 300);
                        $start = substr($start, 0, strrpos($start, ' ')) . '...';
                        $content = $start;
                     }
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
                                <?= $content; ?>
                            </p>
                        </div>
                            <p class="lien">
                                <a href="index.php?controller=home&action=getchapitre&chapitre=<?= $chapitre->getSort() ?>">Accéder au chapitre</a>
                            </p>
                    </div>
                </div>
            <?php
            }
            ?>      
            </div>

        
        
            <p class="mt-2"> Accéder à la page :
            <?php 
                for ($i = 1; $i <= $totalPage; $i++){ 
                    if($i == $page ) { ?>
                            <?= $i ?>
                    <?php } 
                    else { ?>
                        <a href="?page=<?= $i ?>"><?= $i ?></a>
                    <?php  } 
                } ?>
            </p>
    </div>
</div>


<?php include("footer.php"); ?>
<?php require('template.php'); ?>