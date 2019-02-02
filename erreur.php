<?php $title = "Erreur !"; ?>
<?php include(dirname(__FILE__).'/view/header.php') ?>

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
    <div class="col-lg-12 mainpage">
        
        <h2>Oups ! Quelque chose s'est mal passé !</h2>
        <h3 class="error-page">La page que vous recherchez ne semble pas être disponible pour le moment !</h3>
        
        <p class="lien">
            <a href="index.php">Cliquez ici pour revenir sur la page d'accueil du site.</a>
        </p>

    </div>
</div>

<?php include(dirname(__FILE__).'/view/footer.php') ?>
<?php require(dirname(__FILE__).'/view/template.php') ?>