<?php include("header.php"); ?>
<?php $title = isset($chapitre) ? $chapitre->getTitle() : 'Ecrire un chapitre'; ?>


<div class="row">
    <div class="col-lg-12" id="menu">
        <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarText" >
                
                <div class="navbar-nav mr-auto">
                    <a class="nav-item nav-link" href="index.php?controller=chapitre&action=adminList">Retourner à l'espace d'administration</a>
                </div>
                
                <div class="navbar-nav">
                  <a class="nav-item nav-link" href="index.php?controller=admin&action=logout">Se déconnecter</a>
                </div>
                
            </div>
            
        </nav>
    </div>
</div>



<div class="row">
    <div class="col-lg-12 mainpage">
        
        <h2>Editer le chapitre :</h2>
        <form method="post" action="<?= $formAction ?>">
            <div>
                <label for="title">Titre :</label><br />
                <input type="text" id="title" name="title" size="25" value="<?= isset($chapitre) ? $chapitre->getTitle() : ''; ?>" /><br />
                <?php if(isset($chapitre)) { ?>
                <label for="sort">Numéro du chapitre :</label><br />
                <input type="text" id="sort" name="sort" size="25" value="<?= isset($chapitre) ? $chapitre->getSort() : ''; ?>" />
                <?php }?>
            </div>
            <div>
                <label for="content">Contenu :</label><br />
                <textarea rows="8" cols="60" id="content" name="content" value=""><?= isset($chapitre) ? $chapitre->getContent() : ''; ?></textarea>            
            </div>
            <div>
                <input type="hidden" name="id" value="<?= isset($chapitre) ? $chapitre->getId() : ''; ?>" />
                <input type="submit" name="modifier" />
            </div>
        </form>

    </div>
</div>


<?php include("footer.php"); ?>
<?php require('template.php'); ?>